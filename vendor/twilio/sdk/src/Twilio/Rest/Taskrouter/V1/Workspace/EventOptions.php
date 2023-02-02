<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Taskrouter\V1\Workspace;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
abstract class EventOptions
{
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param string $eventType The type of Events to read
     * @param int $minutes The period of events to read in minutes
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @param \DateTime $startDate Only include Events from on or after this date
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @param string $taskSid The SID of the Task with the Events to read
     * @param string $workerSid The SID of the Worker with the Events to read
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @param string $taskChannel The TaskChannel with the Events to read
     * @param string $sid The unique string that identifies the resource
     * @return ReadEventOptions Options builder
     */
    public static function read(\DateTime $endDate = Values::NONE, string $eventType = Values::NONE, int $minutes = Values::NONE, string $reservationSid = Values::NONE, \DateTime $startDate = Values::NONE, string $taskQueueSid = Values::NONE, string $taskSid = Values::NONE, string $workerSid = Values::NONE, string $workflowSid = Values::NONE, string $taskChannel = Values::NONE, string $sid = Values::NONE) : ReadEventOptions
    {
        return new ReadEventOptions($endDate, $eventType, $minutes, $reservationSid, $startDate, $taskQueueSid, $taskSid, $workerSid, $workflowSid, $taskChannel, $sid);
    }
}
class ReadEventOptions extends Options
{
    /**
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @param string $eventType The type of Events to read
     * @param int $minutes The period of events to read in minutes
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @param \DateTime $startDate Only include Events from on or after this date
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @param string $taskSid The SID of the Task with the Events to read
     * @param string $workerSid The SID of the Worker with the Events to read
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @param string $taskChannel The TaskChannel with the Events to read
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(\DateTime $endDate = Values::NONE, string $eventType = Values::NONE, int $minutes = Values::NONE, string $reservationSid = Values::NONE, \DateTime $startDate = Values::NONE, string $taskQueueSid = Values::NONE, string $taskSid = Values::NONE, string $workerSid = Values::NONE, string $workflowSid = Values::NONE, string $taskChannel = Values::NONE, string $sid = Values::NONE)
    {
        $this->options['endDate'] = $endDate;
        $this->options['eventType'] = $eventType;
        $this->options['minutes'] = $minutes;
        $this->options['reservationSid'] = $reservationSid;
        $this->options['startDate'] = $startDate;
        $this->options['taskQueueSid'] = $taskQueueSid;
        $this->options['taskSid'] = $taskSid;
        $this->options['workerSid'] = $workerSid;
        $this->options['workflowSid'] = $workflowSid;
        $this->options['taskChannel'] = $taskChannel;
        $this->options['sid'] = $sid;
    }
    /**
     * Only include Events that occurred on or before this date, specified in GMT as an [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) date-time.
     *
     * @param \DateTime $endDate Only include usage that occurred on or before this
     *                           date
     * @return $this Fluent Builder
     */
    public function setEndDate(\DateTime $endDate) : self
    {
        $this->options['endDate'] = $endDate;
        return $this;
    }
    /**
     * The type of Events to read. Returns only Events of the type specified.
     *
     * @param string $eventType The type of Events to read
     * @return $this Fluent Builder
     */
    public function setEventType(string $eventType) : self
    {
        $this->options['eventType'] = $eventType;
        return $this;
    }
    /**
     * The period of events to read in minutes. Returns only Events that occurred since this many minutes in the past. The default is `15` minutes. Task Attributes for Events occuring more 43,200 minutes ago will be redacted.
     *
     * @param int $minutes The period of events to read in minutes
     * @return $this Fluent Builder
     */
    public function setMinutes(int $minutes) : self
    {
        $this->options['minutes'] = $minutes;
        return $this;
    }
    /**
     * The SID of the Reservation with the Events to read. Returns only Events that pertain to the specified Reservation.
     *
     * @param string $reservationSid The SID of the Reservation with the Events to
     *                               read
     * @return $this Fluent Builder
     */
    public function setReservationSid(string $reservationSid) : self
    {
        $this->options['reservationSid'] = $reservationSid;
        return $this;
    }
    /**
     * Only include Events from on or after this date and time, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format. Task Attributes for Events older than 30 days will be redacted.
     *
     * @param \DateTime $startDate Only include Events from on or after this date
     * @return $this Fluent Builder
     */
    public function setStartDate(\DateTime $startDate) : self
    {
        $this->options['startDate'] = $startDate;
        return $this;
    }
    /**
     * The SID of the TaskQueue with the Events to read. Returns only the Events that pertain to the specified TaskQueue.
     *
     * @param string $taskQueueSid The SID of the TaskQueue with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskQueueSid(string $taskQueueSid) : self
    {
        $this->options['taskQueueSid'] = $taskQueueSid;
        return $this;
    }
    /**
     * The SID of the Task with the Events to read. Returns only the Events that pertain to the specified Task.
     *
     * @param string $taskSid The SID of the Task with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskSid(string $taskSid) : self
    {
        $this->options['taskSid'] = $taskSid;
        return $this;
    }
    /**
     * The SID of the Worker with the Events to read. Returns only the Events that pertain to the specified Worker.
     *
     * @param string $workerSid The SID of the Worker with the Events to read
     * @return $this Fluent Builder
     */
    public function setWorkerSid(string $workerSid) : self
    {
        $this->options['workerSid'] = $workerSid;
        return $this;
    }
    /**
     * The SID of the Workflow with the Events to read. Returns only the Events that pertain to the specified Workflow.
     *
     * @param string $workflowSid The SID of the Worker with the Events to read
     * @return $this Fluent Builder
     */
    public function setWorkflowSid(string $workflowSid) : self
    {
        $this->options['workflowSid'] = $workflowSid;
        return $this;
    }
    /**
     * The TaskChannel with the Events to read. Returns only the Events that pertain to the specified TaskChannel.
     *
     * @param string $taskChannel The TaskChannel with the Events to read
     * @return $this Fluent Builder
     */
    public function setTaskChannel(string $taskChannel) : self
    {
        $this->options['taskChannel'] = $taskChannel;
        return $this;
    }
    /**
     * The SID of the Event resource to read.
     *
     * @param string $sid The unique string that identifies the resource
     * @return $this Fluent Builder
     */
    public function setSid(string $sid) : self
    {
        $this->options['sid'] = $sid;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Taskrouter.V1.ReadEventOptions ' . $options . ']';
    }
}
