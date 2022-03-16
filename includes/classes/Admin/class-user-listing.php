<?php
/**
 * Responsible for user listing in admin manipulation.
 *
 * @package    wp2fa
 * @subpackage user-utils
 * @copyright  2021 WP White Security
 * @license    https://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @link       https://wordpress.org/plugins/wp-2fa/
 */

namespace WP2FA\Admin;

use WP2FA\Utils\User_Utils;
use WP2FA\Admin\Helpers\User_Helper;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * User_Listing class with user listing filters
 */
if ( ! class_exists( '\WP2FA\Admin\User_Listing' ) ) {

	/**
	 * User_Listing - Shows extra column in user table wit WP2FA status forevery user
	 */
	class User_Listing {

		/**
		 * The users table column name
		 *
		 * @var string
		 */
		private static $column_name = '2fa-status';

		/**
		 * Inits all the hooks used for showing the extra user data in the users column
		 *
		 * @return void
		 */
		public static function init() {
			add_filter( 'manage_users_columns', array( __CLASS__, 'add_wp_2fa_column' ) );
			add_filter( 'wpmu_users_columns', array( __CLASS__, 'add_wp_2fa_column' ) );
			add_filter( 'manage_users_custom_column', array( __CLASS__, 'show_column_data' ), 10, 3 );
		}

		/**
		 * Sets the column in the admin users table
		 *
		 * @param array $columns - Array with all the columns.
		 *
		 * @return array
		 */
		public static function add_wp_2fa_column( array $columns ): array {
			$columns[ self::$column_name ] = __( '2FA Status', 'wp-2fa' );
			return $columns;
		}

		/**
		 * Shows the user WP 2FA status data in the users table
		 *
		 * @param [type] $value - The value of the column.
		 * @param string $column_name - The name of the column.
		 * @param [type] $user_id - the ID of the user.
		 *
		 * @return mixed
		 */
		public static function show_column_data( $value, string $column_name, $user_id ) {

			switch ( $column_name ) {
				case self::$column_name:
					return self::get_user2fa_status( $user_id );
				default:
			}

			return $value;
		}

		/**
		 * Retrieves the translated 2FA status label for given user.
		 *
		 * This is performance optimized version that bypasses the User class on purpose. It loads the 2FA status meta
		 * field directly and turns it into a label.
		 *
		 * There is also some temporary code to figure out the 2FA status meta field if it doesn't exist. This will be
		 * removed in future versions and exist purely so we don't end up with no values in the column after migration
		 * to version 1.7.0 when this was introduced.
		 *
		 * @param int $user_id - The id of the user for which the info should be extracted.
		 *
		 * @return string
		 * @see WP2FA\Admin\User
		 * @since 1.7.0
		 */
		private static function get_user2fa_status( $user_id ) {
			// try to get the user status "id" from user's meta data.
			$status_meta_value = User_Helper::get_2fa_status( $user_id );
			if ( ! empty( $status_meta_value ) ) {
				// the status id is available, grab the label to display.
				$status_data = User_Utils::extract_statuses( array( $status_meta_value ) );
				if ( ! empty( $status_data ) ) {
					return $status_data['label'];
				}
			}

			// If the user status is not saved in user meta (this can be the case prior to version 1.7.0), we figure it
			// out and store it against the user in DB. This is not ideal in terms of performance and this is only
			// a temporary solution.
			// @todo remove this in future versions.
			return User::set_user_status( new \WP_User( $user_id ) );
		}

		/**
		 * Returns the users table column name
		 *
		 * @return string
		 */
		public static function get_column_name(): string {
			return self::$column_name;
		}
	}
}
