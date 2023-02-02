<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\FlexApi\V1;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
class ConfigurationList extends ListResource
{
    /**
     * Construct the ConfigurationList
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
     * Constructs a ConfigurationContext
     */
    public function getContext() : ConfigurationContext
    {
        return new ConfigurationContext($this->version);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.FlexApi.V1.ConfigurationList]';
    }
}
