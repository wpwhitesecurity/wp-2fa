<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Oauth\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $userSid
 * @property string $firstName
 * @property string $lastName
 * @property string $friendlyName
 * @property string $email
 * @property string $url
 */
class UserInfoInstance extends InstanceResource
{
    /**
     * Initialize the UserInfoInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     */
    public function __construct(Version $version, array $payload)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['userSid' => Values::array_get($payload, 'user_sid'), 'firstName' => Values::array_get($payload, 'first_name'), 'lastName' => Values::array_get($payload, 'last_name'), 'friendlyName' => Values::array_get($payload, 'friendly_name'), 'email' => Values::array_get($payload, 'email'), 'url' => Values::array_get($payload, 'url')];
        $this->solution = [];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return UserInfoContext Context for this UserInfoInstance
     */
    protected function proxy() : UserInfoContext
    {
        if (!$this->context) {
            $this->context = new UserInfoContext($this->version);
        }
        return $this->context;
    }
    /**
     * Fetch the UserInfoInstance
     *
     * @return UserInfoInstance Fetched UserInfoInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : UserInfoInstance
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
        return '[Twilio.Oauth.V1.UserInfoInstance ' . \implode(' ', $context) . ']';
    }
}