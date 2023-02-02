<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Supersim\V1;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $simSid
 * @property string $simIccid
 * @property string $status
 * @property string $direction
 * @property string $deviceIp
 * @property int $devicePort
 * @property string $payloadType
 * @property string $payload
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class IpCommandInstance extends InstanceResource
{
    /**
     * Initialize the IpCommandInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'simSid' => Values::array_get($payload, 'sim_sid'), 'simIccid' => Values::array_get($payload, 'sim_iccid'), 'status' => Values::array_get($payload, 'status'), 'direction' => Values::array_get($payload, 'direction'), 'deviceIp' => Values::array_get($payload, 'device_ip'), 'devicePort' => Values::array_get($payload, 'device_port'), 'payloadType' => Values::array_get($payload, 'payload_type'), 'payload' => Values::array_get($payload, 'payload'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return IpCommandContext Context for this IpCommandInstance
     */
    protected function proxy() : IpCommandContext
    {
        if (!$this->context) {
            $this->context = new IpCommandContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the IpCommandInstance
     *
     * @return IpCommandInstance Fetched IpCommandInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : IpCommandInstance
    {
        return $this->proxy()->fetch();
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
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Supersim.V1.IpCommandInstance ' . \implode(' ', $context) . ']';
    }
}
