<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Conversations\V1\Configuration;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class WebhookContext extends InstanceContext
{
    /**
     * Initialize the WebhookContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/Configuration/Webhooks';
    }
    /**
     * Fetch the WebhookInstance
     *
     * @return WebhookInstance Fetched WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : WebhookInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new WebhookInstance($this->version, $payload);
    }
    /**
     * Update the WebhookInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WebhookInstance Updated WebhookInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : WebhookInstance
    {
        $options = new Values($options);
        $data = Values::of(['Method' => $options['method'], 'Filters' => Serialize::map($options['filters'], function ($e) {
            return $e;
        }), 'PreWebhookUrl' => $options['preWebhookUrl'], 'PostWebhookUrl' => $options['postWebhookUrl'], 'Target' => $options['target']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new WebhookInstance($this->version, $payload);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Conversations.V1.WebhookContext ' . \implode(' ', $context) . ']';
    }
}