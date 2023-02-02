<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Conversations\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class ConfigurationContext extends InstanceContext
{
    /**
     * Initialize the ConfigurationContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/Configuration';
    }
    /**
     * Fetch the ConfigurationInstance
     *
     * @return ConfigurationInstance Fetched ConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : ConfigurationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new ConfigurationInstance($this->version, $payload);
    }
    /**
     * Update the ConfigurationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConfigurationInstance Updated ConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : ConfigurationInstance
    {
        $options = new Values($options);
        $data = Values::of(['DefaultChatServiceSid' => $options['defaultChatServiceSid'], 'DefaultMessagingServiceSid' => $options['defaultMessagingServiceSid'], 'DefaultInactiveTimer' => $options['defaultInactiveTimer'], 'DefaultClosedTimer' => $options['defaultClosedTimer']]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new ConfigurationInstance($this->version, $payload);
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
        return '[Twilio.Conversations.V1.ConfigurationContext ' . \implode(' ', $context) . ']';
    }
}