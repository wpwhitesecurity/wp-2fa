<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Trusthub\V1\CustomerProfiles;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class CustomerProfilesEvaluationsContext extends InstanceContext
{
    /**
     * Initialize the CustomerProfilesEvaluationsContext
     *
     * @param Version $version Version that contains the resource
     * @param string $customerProfileSid The unique string that identifies the
     *                                   resource
     * @param string $sid The unique string that identifies the Evaluation resource
     */
    public function __construct(Version $version, $customerProfileSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['customerProfileSid' => $customerProfileSid, 'sid' => $sid];
        $this->uri = '/CustomerProfiles/' . \rawurlencode($customerProfileSid) . '/Evaluations/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the CustomerProfilesEvaluationsInstance
     *
     * @return CustomerProfilesEvaluationsInstance Fetched
     *                                             CustomerProfilesEvaluationsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : CustomerProfilesEvaluationsInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new CustomerProfilesEvaluationsInstance($this->version, $payload, $this->solution['customerProfileSid'], $this->solution['sid']);
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
        return '[Twilio.Trusthub.V1.CustomerProfilesEvaluationsContext ' . \implode(' ', $context) . ']';
    }
}
