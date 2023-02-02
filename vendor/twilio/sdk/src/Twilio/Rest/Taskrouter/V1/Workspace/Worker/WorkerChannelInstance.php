<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Taskrouter\V1\Workspace\Worker;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property string $accountSid
 * @property int $assignedTasks
 * @property bool $available
 * @property int $availableCapacityPercentage
 * @property int $configuredCapacity
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $sid
 * @property string $taskChannelSid
 * @property string $taskChannelUniqueName
 * @property string $workerSid
 * @property string $workspaceSid
 * @property string $url
 */
class WorkerChannelInstance extends InstanceResource
{
    /**
     * Initialize the WorkerChannelInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $workspaceSid The SID of the Workspace that contains the
     *                             WorkerChannel
     * @param string $workerSid The SID of the Worker that contains the
     *                          WorkerChannel
     * @param string $sid The SID of the to fetch
     */
    public function __construct(Version $version, array $payload, string $workspaceSid, string $workerSid, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['accountSid' => Values::array_get($payload, 'account_sid'), 'assignedTasks' => Values::array_get($payload, 'assigned_tasks'), 'available' => Values::array_get($payload, 'available'), 'availableCapacityPercentage' => Values::array_get($payload, 'available_capacity_percentage'), 'configuredCapacity' => Values::array_get($payload, 'configured_capacity'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'sid' => Values::array_get($payload, 'sid'), 'taskChannelSid' => Values::array_get($payload, 'task_channel_sid'), 'taskChannelUniqueName' => Values::array_get($payload, 'task_channel_unique_name'), 'workerSid' => Values::array_get($payload, 'worker_sid'), 'workspaceSid' => Values::array_get($payload, 'workspace_sid'), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['workspaceSid' => $workspaceSid, 'workerSid' => $workerSid, 'sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return WorkerChannelContext Context for this WorkerChannelInstance
     */
    protected function proxy() : WorkerChannelContext
    {
        if (!$this->context) {
            $this->context = new WorkerChannelContext($this->version, $this->solution['workspaceSid'], $this->solution['workerSid'], $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the WorkerChannelInstance
     *
     * @return WorkerChannelInstance Fetched WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : WorkerChannelInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the WorkerChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return WorkerChannelInstance Updated WorkerChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : WorkerChannelInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Taskrouter.V1.WorkerChannelInstance ' . \implode(' ', $context) . ']';
    }
}