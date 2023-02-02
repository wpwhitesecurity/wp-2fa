<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Api\V2010\Account\Sip\Domain;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $domainSid
 * @property string $friendlyName
 * @property string $sid
 * @property string $uri
 */
class CredentialListMappingInstance extends InstanceResource
{
    /**
     * Initialize the CredentialListMappingInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid The unique id of the Account that is responsible
     *                           for this resource.
     * @param string $domainSid The unique string that identifies the SipDomain
     *                          resource.
     * @param string $sid A string that identifies the resource to fetch
     */
    public function __construct(Version $version, array $payload, string $accountSid, string $domainSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => Values::array_get($payload, 'account_sid'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'domainSid' => Values::array_get($payload, 'domain_sid'), 'friendlyName' => Values::array_get($payload, 'friendly_name'), 'sid' => Values::array_get($payload, 'sid'), 'uri' => Values::array_get($payload, 'uri')];
        $this->solution = ['accountSid' => $accountSid, 'domainSid' => $domainSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return CredentialListMappingContext Context for this
     *                                      CredentialListMappingInstance
     */
    protected function proxy() : CredentialListMappingContext
    {
        if (!$this->context) {
            $this->context = new CredentialListMappingContext($this->version, $this->solution['accountSid'], $this->solution['domainSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the CredentialListMappingInstance
     *
     * @return CredentialListMappingInstance Fetched CredentialListMappingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : CredentialListMappingInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Delete the CredentialListMappingInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
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
        return '[Twilio.Api.V2010.CredentialListMappingInstance ' . \implode(' ', $context) . ']';
    }
}
