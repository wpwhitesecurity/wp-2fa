<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Conversations\V1;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $sid
 * @property string $accountSid
 * @property string $chatServiceSid
 * @property string $friendlyName
 * @property string $type
 * @property string[] $permissions
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class RoleInstance extends InstanceResource
{
    /**
     * Initialize the RoleInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the Role resource to fetch
     */
    public function __construct(Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'chatServiceSid' => Values::array_get($payload, 'chat_service_sid'), 'friendlyName' => Values::array_get($payload, 'friendly_name'), 'type' => Values::array_get($payload, 'type'), 'permissions' => Values::array_get($payload, 'permissions'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return RoleContext Context for this RoleInstance
     */
    protected function proxy() : RoleContext
    {
        if (!$this->context) {
            $this->context = new RoleContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Update the RoleInstance
     *
     * @param string[] $permission A permission the role should have
     * @return RoleInstance Updated RoleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $permission) : RoleInstance
    {
        return $this->proxy()->update($permission);
    }
    /**
     * Delete the RoleInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Fetch the RoleInstance
     *
     * @return RoleInstance Fetched RoleInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : RoleInstance
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
        return '[Twilio.Conversations.V1.RoleInstance ' . \implode(' ', $context) . ']';
    }
}
