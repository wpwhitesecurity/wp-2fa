<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Content\V1\Content;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class ApprovalFetchList extends ListResource
{
    /**
     * Construct the ApprovalFetchList
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the Content resource
     */
    public function __construct(Version $version, string $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
    }
    /**
     * Constructs a ApprovalFetchContext
     */
    public function getContext() : ApprovalFetchContext
    {
        return new ApprovalFetchContext($this->version, $this->solution['sid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Content.V1.ApprovalFetchList]';
    }
}