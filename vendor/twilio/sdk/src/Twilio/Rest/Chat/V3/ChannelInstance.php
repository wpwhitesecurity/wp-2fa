<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Chat\V3;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $friendlyName
 * @property string $uniqueName
 * @property string $attributes
 * @property string $type
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $createdBy
 * @property int $membersCount
 * @property int $messagesCount
 * @property string $messagingServiceSid
 * @property string $url
 */
class ChannelInstance extends InstanceResource
{
    /**
     * Initialize the ChannelInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid Service Sid.
     * @param string $sid A string that uniquely identifies this Channel.
     */
    public function __construct(Version $version, array $payload, string $serviceSid = null, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'serviceSid' => Values::array_get($payload, 'service_sid'), 'friendlyName' => Values::array_get($payload, 'friendly_name'), 'uniqueName' => Values::array_get($payload, 'unique_name'), 'attributes' => Values::array_get($payload, 'attributes'), 'type' => Values::array_get($payload, 'type'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'createdBy' => Values::array_get($payload, 'created_by'), 'membersCount' => Values::array_get($payload, 'members_count'), 'messagesCount' => Values::array_get($payload, 'messages_count'), 'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['serviceSid' => $serviceSid ?: $this->properties['serviceSid'], 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ChannelContext Context for this ChannelInstance
     */
    protected function proxy() : ChannelContext
    {
        if (!$this->context) {
            $this->context = new ChannelContext($this->version, $this->solution['serviceSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Update the ChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ChannelInstance Updated ChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : ChannelInstance
    {
        return $this->proxy()->update($options);
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
        return '[Twilio.Chat.V3.ChannelInstance ' . \implode(' ', $context) . ']';
    }
}
