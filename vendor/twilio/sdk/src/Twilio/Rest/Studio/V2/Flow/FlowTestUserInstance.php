<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Studio\V2\Flow;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $sid
 * @property string[] $testUsers
 * @property string $url
 */
class FlowTestUserInstance extends InstanceResource
{
    /**
     * Initialize the FlowTestUserInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid Unique identifier of the flow.
     */
    public function __construct(Version $version, array $payload, string $sid)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'testUsers' => Values::array_get($payload, 'test_users'), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['sid' => $sid];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return FlowTestUserContext Context for this FlowTestUserInstance
     */
    protected function proxy() : FlowTestUserContext
    {
        if (!$this->context) {
            $this->context = new FlowTestUserContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the FlowTestUserInstance
     *
     * @return FlowTestUserInstance Fetched FlowTestUserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : FlowTestUserInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the FlowTestUserInstance
     *
     * @param string[] $testUsers List of test user identities that can test draft
     *                            versions of the flow.
     * @return FlowTestUserInstance Updated FlowTestUserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $testUsers) : FlowTestUserInstance
    {
        return $this->proxy()->update($testUsers);
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
        return '[Twilio.Studio.V2.FlowTestUserInstance ' . \implode(' ', $context) . ']';
    }
}