<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Autopilot\V1\Assistant;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DefaultsContext extends InstanceContext
{
    /**
     * Initialize the DefaultsContext
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The SID of the Assistant that is the parent of
     *                             the resource to fetch
     */
    public function __construct(Version $version, $assistantSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid];
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Defaults';
    }
    /**
     * Fetch the DefaultsInstance
     *
     * @return DefaultsInstance Fetched DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : DefaultsInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new DefaultsInstance($this->version, $payload, $this->solution['assistantSid']);
    }
    /**
     * Update the DefaultsInstance
     *
     * @param array|Options $options Optional Arguments
     * @return DefaultsInstance Updated DefaultsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : DefaultsInstance
    {
        $options = new Values($options);
        $data = Values::of(['Defaults' => Serialize::jsonObject($options['defaults'])]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new DefaultsInstance($this->version, $payload, $this->solution['assistantSid']);
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
        return '[Twilio.Autopilot.V1.DefaultsContext ' . \implode(' ', $context) . ']';
    }
}
