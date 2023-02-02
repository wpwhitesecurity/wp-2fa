<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Taskrouter\V1\Workspace;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
class WorkspaceCumulativeStatisticsList extends ListResource
{
    /**
     * Construct the WorkspaceCumulativeStatisticsList
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace
     */
    public function __construct(Version $version, string $workspaceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid];
    }
    /**
     * Constructs a WorkspaceCumulativeStatisticsContext
     */
    public function getContext() : WorkspaceCumulativeStatisticsContext
    {
        return new WorkspaceCumulativeStatisticsContext($this->version, $this->solution['workspaceSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Taskrouter.V1.WorkspaceCumulativeStatisticsList]';
    }
}