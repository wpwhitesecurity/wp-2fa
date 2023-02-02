<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Api\V2010\Account\Call;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $sid
 * @property string $accountSid
 * @property string $callSid
 * @property string $name
 * @property string $status
 * @property \DateTime $dateUpdated
 * @property string $uri
 */
class StreamInstance extends InstanceResource
{
    /**
     * Initialize the StreamInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The SID of the Account that created this resource
     * @param string $callSid The SID of the Call the resource is associated with
     * @param string $sid The SID of the Stream resource, or the `name`
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $callSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'callSid' => Values::array_get($payload, 'call_sid'), 'name' => Values::array_get($payload, 'name'), 'status' => Values::array_get($payload, 'status'), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'uri' => Values::array_get($payload, 'uri')];
        $this->solution = ['accountSid' => $accountSid, 'callSid' => $callSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return StreamContext Context for this StreamInstance
     */
    protected function proxy() : StreamContext
    {
        if (!$this->context) {
            $this->context = new StreamContext($this->version, $this->solution['accountSid'], $this->solution['callSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Update the StreamInstance
     *
     * @param string $status The status. Must have the value `stopped`
     * @return StreamInstance Updated StreamInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status) : StreamInstance
    {
        return $this->proxy()->update($status);
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
        return '[Twilio.Api.V2010.StreamInstance ' . \implode(' ', $context) . ']';
    }
}