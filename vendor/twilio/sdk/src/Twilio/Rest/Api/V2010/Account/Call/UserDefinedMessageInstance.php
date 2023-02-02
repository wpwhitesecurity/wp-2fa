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
 * @property string $accountSid
 * @property string $callSid
 * @property string $sid
 * @property \DateTime $dateCreated
 */
class UserDefinedMessageInstance extends InstanceResource
{
    /**
     * Initialize the UserDefinedMessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid Account SID.
     * @param string $callSid Call SID.
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $callSid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => Values::array_get($payload, 'account_sid'), 'callSid' => Values::array_get($payload, 'call_sid'), 'sid' => Values::array_get($payload, 'sid'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created'))];
        $this->solution = ['accountSid' => $accountSid, 'callSid' => $callSid];
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
        return '[Twilio.Api.V2010.UserDefinedMessageInstance]';
    }
}