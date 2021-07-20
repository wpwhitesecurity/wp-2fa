<?php

// phpcs:ignore
/**
 * Core plugin functionality.
 *
 * @package WP2FA
 */
namespace WP2FA_Vendor\WP2FA\Core;

use WP2FA_Vendor\WP2FA\Admin\SettingsPage as SettingsPage;
use WP2FA_Vendor\WP2FA\Utils\UserUtils;
use WP2FA_Vendor\WP2FA\Utils\SettingsUtils as SettingsUtils;
/**
 * Default setup routine
 *
 * @return void
 */
function setup()
{
    $n = function ($function) {
        return __NAMESPACE__ . "\\{$function}";
    };
    add_action('init', $n('i18n'));
    add_action('init', $n('init'));
    add_action('admin_enqueue_scripts', $n('admin_scripts'));
    add_action('admin_enqueue_scripts', $n('admin_styles'));
    // Hook to allow async or defer on asset loading.
    add_filter('script_loader_tag', $n('script_loader_tag'), 10, 2);
    do_action('wp_2fa_loaded');
}
/**
 * Registers the default textdomain.
 *
 * @return void
 */
function i18n()
{
    $locale = apply_filters('plugin_locale', get_locale(), 'wp-2fa');
    load_textdomain('wp-2fa', WP_LANG_DIR . '/wp-2fa/wp-2fa-' . $locale . '.mo');
    load_plugin_textdomain('wp-2fa', \false, plugin_basename(WP_2FA_PATH) . '/languages/');
}
/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @return void
 */
function init()
{
    do_action('wp_2fa_init');
}
/**
 * Activate the plugin
 *
 * @return void
 */
function activate()
{
    // First load the init scripts in case any rewrite functionality is being loaded.
    init();
    flush_rewrite_rules();
    // Check if the user is allowed to manage options for the site.
    if (current_user_can('manage_options')) {
        // Add an option to let our plugin know this user has not been through the setup wizard.
        \WP2FA_Vendor\WP2FA\Utils\SettingsUtils::update_option('redirect_on_activate', \true);
    }
    // Add plugin version to wp_options.
    \WP2FA_Vendor\WP2FA\Utils\SettingsUtils::update_option('plugin_version', WP_2FA_VERSION);
}
/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate()
{
}
/**
 * Uninstall the plugin
 *
 * @return void
 */
function uninstall()
{
    if (!empty(\WP2FA_Vendor\WP2FA\WP2FA::get_wp2fa_setting('delete_data_upon_uninstall'))) {
        // Delete settings from wp_options.
        if (\WP2FA_Vendor\WP2FA\WP2FA::is_this_multisite()) {
            $network_id = get_current_network_id();
            global $wpdb;
            $wpdb->query($wpdb->prepare("\n\t\t\t\t\tDELETE FROM {$wpdb->sitemeta}\n\t\t\t\t\tWHERE meta_key LIKE %s\n\t\t\t\t\tAND site_id = %d\n\t\t\t\t\t", ['wp_2fa_%', $network_id]));
        } else {
            global $wpdb;
            $wpdb->query($wpdb->prepare("\n\t\t\t\t\tDELETE FROM {$wpdb->options}\n\t\t\t\t\tWHERE option_name LIKE %s\n\t\t\t\t\t", ['wp_2fa_%']));
        }
        $users_args = array('fields' => array('ID'));
        if (\WP2FA_Vendor\WP2FA\WP2FA::is_this_multisite()) {
            $users_args['blog_id'] = 0;
        }
        $settings = new \WP2FA_Vendor\WP2FA\Admin\SettingsPage();
        $users = \WP2FA_Vendor\WP2FA\Utils\UserUtils::get_all_user_ids('query', $users_args);
        if (!\is_array($users)) {
            $users = \explode(',', $users);
        }
        foreach ($users as $user_id) {
            global $wpdb;
            $wpdb->query($wpdb->prepare("\n\t\t\t\t DELETE FROM {$wpdb->usermeta}\n\t\t\t\t WHERE user_id = %d\n\t\t\t\t AND meta_key LIKE %s\n\t\t\t\t ", [$user_id, 'wp_2fa_%']));
        }
    }
}
/**
 * The list of knows contexts for enqueuing scripts/styles.
 *
 * @return array
 */
function get_enqueue_contexts()
{
    return array('admin', 'frontend', 'shared');
}
/**
 * Generate an URL to a script, taking into account whether SCRIPT_DEBUG is enabled.
 *
 * @param string $script Script file name (no .js extension).
 * @param string $context Context for the script ('admin', 'frontend', or 'shared').
 *
 * @return string|WP_Error URL
 */
function script_url($script, $context)
{
    if (!\in_array($context, get_enqueue_contexts(), \true)) {
        return new \WP_Error('invalid_enqueue_context', 'Invalid $context specified in WP2FA script loader.');
    }
    return WP_2FA_URL . "dist/js/{$script}.js";
}
/**
 * Generate an URL to a stylesheet, taking into account whether SCRIPT_DEBUG is enabled.
 *
 * @param string $stylesheet Stylesheet file name (no .css extension).
 * @param string $context Context for the script ('admin', 'frontend', or 'shared').
 *
 * @return string URL
 */
function style_url($stylesheet, $context)
{
    if (!\in_array($context, get_enqueue_contexts(), \true)) {
        return new \WP_Error('invalid_enqueue_context', 'Invalid $context specified in WP2FA stylesheet loader.');
    }
    return WP_2FA_URL . "dist/css/{$stylesheet}.css";
}
/**
 * Enqueue scripts for admin.
 *
 * @return void
 */
function admin_scripts()
{
    wp_enqueue_script('wp_2fa_admin', script_url('admin', 'admin'), array('jquery-ui-widget', 'jquery-ui-core', 'jquery-ui-autocomplete', 'wp_2fa_micro_modals', 'select2'), WP_2FA_VERSION, \true);
    wp_enqueue_script('wp_2fa_micro_modals', script_url('micromodal', 'admin'), array(), WP_2FA_VERSION, \true);
    enqueueSelect2Scripts();
    if (\WP2FA_Vendor\WP2FA\WP2FA::is_this_multisite()) {
        enqueueMultiSelectScripts();
    }
    // Data array.
    $data_array = array('ajaxURL' => admin_url('admin-ajax.php'), 'roles' => \WP2FA_Vendor\WP2FA\WP2FA::wp_2fa_get_roles(), 'nonce' => wp_create_nonce('wp-2fa-settings-nonce'), 'codeValidatedHeading' => esc_html__('Congratulations', 'wp-2fa'), 'codeValidatedText' => esc_html__('Your account just got more secure', 'wp-2fa'), 'codeValidatedButton' => esc_html__('Close Wizard & Refresh', 'wp-2fa'), 'processingText' => esc_html__('Processing Update', 'wp-2fa'), 'email_sent_success' => esc_html__('Email successfully sent', 'wp-2fa'), 'email_sent_failure' => esc_html__('Email delivery failed', 'wp-2fa'));
    wp_localize_script('wp_2fa_admin', 'wp2faData', $data_array);
    $data_array = array('ajaxURL' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('wp2fa-verify-wizard-page'), 'codesPreamble' => esc_html__('These are the 2FA backup codes for the user', 'wp-2fa'), 'readyText' => esc_html__('I\'m ready', 'wp-2fa'), 'codeReSentText' => esc_html__('New code sent', 'wp-2fa'));
    wp_localize_script('wp_2fa_admin', 'wp2faWizardData', $data_array);
}
/**
 * Enqueue multi select for multinetwork WP
 *
 * @return void
 */
function enqueueMultiSelectScripts()
{
    wp_enqueue_script('multi-site-select', script_url('multi-site-select', 'admin'), ['jquery', 'select2']);
}
/**
 * Enqueue Select2 jQuery library
 *
 * @return void
 */
function enqueueSelect2Scripts()
{
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', ['jquery']);
}
/**
 * Enqueue styles for admin.
 *
 * @return void
 */
function admin_styles()
{
    wp_enqueue_style('wp_2fa_admin', style_url('admin-style', 'admin'), array(), WP_2FA_VERSION);
}
/**
 * Add async/defer attributes to enqueued scripts that have the specified script_execution flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function script_loader_tag($tag, $handle)
{
    $script_execution = wp_scripts()->get_data($handle, 'script_execution');
    if (!$script_execution) {
        return $tag;
    }
    if ('async' !== $script_execution && 'defer' !== $script_execution) {
        return $tag;
    }
    // Abort adding async/defer for scripts that have this script as a dependency. _doing_it_wrong()?
    foreach (wp_scripts()->registered as $script) {
        if (\in_array($handle, $script->deps, \true)) {
            return $tag;
        }
    }
    // Add the attribute if it hasn't already been added.
    if (!\preg_match(":\\s{$script_execution}(=|>|\\s):", $tag)) {
        $tag = \preg_replace(':(?=></script>):', " {$script_execution}", $tag, 1);
    }
    return $tag;
}