<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\FlexApi\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class AssessmentsContext extends InstanceContext
{
    /**
     * Initialize the AssessmentsContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/Accounts/Assessments';
    }
    /**
     * Create the AssessmentsInstance
     *
     * @return AssessmentsInstance Created AssessmentsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create() : AssessmentsInstance
    {
        $payload = $this->version->create('POST', $this->uri);
        return new AssessmentsInstance($this->version, $payload);
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
        return '[Twilio.FlexApi.V1.AssessmentsContext ' . \implode(' ', $context) . ']';
    }
}
