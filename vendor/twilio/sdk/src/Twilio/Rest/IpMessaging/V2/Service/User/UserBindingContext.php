<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\IpMessaging\V2\Service\User;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class UserBindingContext extends InstanceContext
{
    /**
     * Initialize the UserBindingContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $userSid The user_sid
     * @param string $sid The sid
     */
    public function __construct(Version $version, $serviceSid, $userSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'userSid' => $userSid, 'sid' => $sid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Users/' . \rawurlencode($userSid) . '/Bindings/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the UserBindingInstance
     *
     * @return UserBindingInstance Fetched UserBindingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : UserBindingInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new UserBindingInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['userSid'], $this->solution['sid']);
    }
    /**
     * Delete the UserBindingInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
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
        return '[Twilio.IpMessaging.V2.UserBindingContext ' . \implode(' ', $context) . ']';
    }
}
