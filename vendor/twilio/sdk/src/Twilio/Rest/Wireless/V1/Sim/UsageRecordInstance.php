<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Wireless\V1\Sim;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $simSid
 * @property string $accountSid
 * @property array $period
 * @property array $commands
 * @property array $data
 */
class UsageRecordInstance extends InstanceResource
{
    /**
     * Initialize the UsageRecordInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $simSid The SID of the Sim resource that this Usage Record is
     *                       for
     */
    public function __construct(Version $version, array $payload, string $simSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['simSid' => Values::array_get($payload, 'sim_sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'period' => Values::array_get($payload, 'period'), 'commands' => Values::array_get($payload, 'commands'), 'data' => Values::array_get($payload, 'data')];
        $this->solution = ['simSid' => $simSid];
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Wireless.V1.UsageRecordInstance]';
    }
}
