<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Messaging\V1;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class DomainConfigList extends ListResource
{
    /**
     * Construct the DomainConfigList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
    }
    /**
     * Constructs a DomainConfigContext
     *
     * @param string $domainSid Unique string used to identify the domain that this
     *                          config should be associated with.
     */
    public function getContext(string $domainSid) : DomainConfigContext
    {
        return new DomainConfigContext($this->version, $domainSid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Messaging.V1.DomainConfigList]';
    }
}