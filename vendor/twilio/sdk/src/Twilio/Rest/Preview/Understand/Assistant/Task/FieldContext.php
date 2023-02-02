<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Preview\Understand\Assistant\Task;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class FieldContext extends InstanceContext
{
    /**
     * Initialize the FieldContext
     *
     * @param Version $version Version that contains the resource
     * @param string $assistantSid The unique ID of the Assistant.
     * @param string $taskSid The unique ID of the Task associated with this Field.
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     */
    public function __construct(Version $version, $assistantSid, $taskSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['assistantSid' => $assistantSid, 'taskSid' => $taskSid, 'sid' => $sid];
        $this->uri = '/Assistants/' . \rawurlencode($assistantSid) . '/Tasks/' . \rawurlencode($taskSid) . '/Fields/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the FieldInstance
     *
     * @return FieldInstance Fetched FieldInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : FieldInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new FieldInstance($this->version, $payload, $this->solution['assistantSid'], $this->solution['taskSid'], $this->solution['sid']);
    }
    /**
     * Delete the FieldInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
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
        return '[Twilio.Preview.Understand.FieldContext ' . \implode(' ', $context) . ']';
    }
}
