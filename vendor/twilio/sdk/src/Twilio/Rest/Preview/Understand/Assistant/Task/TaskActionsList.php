<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Preview\Understand\Assistant\Task;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class TaskActionsList extends ListResource
{
    /**
     * Construct the TaskActionsList
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The unique ID of the parent Assistant.
     * @param string $taskSid The unique ID of the Task.
     */
    public function __construct(Version $version, string $assistantSid, string $taskSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid, 'taskSid' => $taskSid];
    }
    /**
     * Constructs a TaskActionsContext
     */
    public function getContext() : TaskActionsContext
    {
        return new TaskActionsContext($this->version, $this->solution['assistantSid'], $this->solution['taskSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Preview.Understand.TaskActionsList]';
    }
}