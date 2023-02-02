<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Insights\V1\Call;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class AnnotationList extends ListResource
{
    /**
     * Construct the AnnotationList
     *
     * @param Version $version Version that contains the resource
     * @param string $callSid Call SID.
     */
    public function __construct(Version $version, string $callSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['callSid' => $callSid];
    }
    /**
     * Constructs a AnnotationContext
     */
    public function getContext() : AnnotationContext
    {
        return new AnnotationContext($this->version, $this->solution['callSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Insights.V1.AnnotationList]';
    }
}