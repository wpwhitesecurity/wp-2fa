<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Voice\V1;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class ArchivedCallList extends ListResource
{
    /**
     * Construct the ArchivedCallList
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
     * Constructs a ArchivedCallContext
     *
     * @param \DateTime $date The date of the Call in UTC.
     * @param string $sid The unique string that identifies this resource
     */
    public function getContext(\DateTime $date, string $sid) : ArchivedCallContext
    {
        return new ArchivedCallContext($this->version, $date, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Voice.V1.ArchivedCallList]';
    }
}
