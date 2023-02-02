<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Taskrouter\V1\Workspace\Task;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class ReservationContext extends InstanceContext
{
    /**
     * Initialize the ReservationContext
     *
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The SID of the Workspace with the
     *                             TaskReservation resource to fetch
     * @param string $taskSid The SID of the reserved Task resource with the
     *                        TaskReservation resource to fetch
     * @param string $sid The SID of the TaskReservation resource to fetch
     */
    public function __construct(Version $version, $workspaceSid, $taskSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['workspaceSid' => $workspaceSid, 'taskSid' => $taskSid, 'sid' => $sid];
        $this->uri = '/Workspaces/' . \rawurlencode($workspaceSid) . '/Tasks/' . \rawurlencode($taskSid) . '/Reservations/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the ReservationInstance
     *
     * @return ReservationInstance Fetched ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : ReservationInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new ReservationInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['taskSid'], $this->solution['sid']);
    }
    /**
     * Update the ReservationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ReservationInstance Updated ReservationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : ReservationInstance
    {
        $options = new Values($options);
        $data = Values::of(['ReservationStatus' => $options['reservationStatus'], 'WorkerActivitySid' => $options['workerActivitySid'], 'Instruction' => $options['instruction'], 'DequeuePostWorkActivitySid' => $options['dequeuePostWorkActivitySid'], 'DequeueFrom' => $options['dequeueFrom'], 'DequeueRecord' => $options['dequeueRecord'], 'DequeueTimeout' => $options['dequeueTimeout'], 'DequeueTo' => $options['dequeueTo'], 'DequeueStatusCallbackUrl' => $options['dequeueStatusCallbackUrl'], 'CallFrom' => $options['callFrom'], 'CallRecord' => $options['callRecord'], 'CallTimeout' => $options['callTimeout'], 'CallTo' => $options['callTo'], 'CallUrl' => $options['callUrl'], 'CallStatusCallbackUrl' => $options['callStatusCallbackUrl'], 'CallAccept' => Serialize::booleanToString($options['callAccept']), 'RedirectCallSid' => $options['redirectCallSid'], 'RedirectAccept' => Serialize::booleanToString($options['redirectAccept']), 'RedirectUrl' => $options['redirectUrl'], 'To' => $options['to'], 'From' => $options['from'], 'StatusCallback' => $options['statusCallback'], 'StatusCallbackMethod' => $options['statusCallbackMethod'], 'StatusCallbackEvent' => Serialize::map($options['statusCallbackEvent'], function ($e) {
            return $e;
        }), 'Timeout' => $options['timeout'], 'Record' => Serialize::booleanToString($options['record']), 'Muted' => Serialize::booleanToString($options['muted']), 'Beep' => $options['beep'], 'StartConferenceOnEnter' => Serialize::booleanToString($options['startConferenceOnEnter']), 'EndConferenceOnExit' => Serialize::booleanToString($options['endConferenceOnExit']), 'WaitUrl' => $options['waitUrl'], 'WaitMethod' => $options['waitMethod'], 'EarlyMedia' => Serialize::booleanToString($options['earlyMedia']), 'MaxParticipants' => $options['maxParticipants'], 'ConferenceStatusCallback' => $options['conferenceStatusCallback'], 'ConferenceStatusCallbackMethod' => $options['conferenceStatusCallbackMethod'], 'ConferenceStatusCallbackEvent' => Serialize::map($options['conferenceStatusCallbackEvent'], function ($e) {
            return $e;
        }), 'ConferenceRecord' => $options['conferenceRecord'], 'ConferenceTrim' => $options['conferenceTrim'], 'RecordingChannels' => $options['recordingChannels'], 'RecordingStatusCallback' => $options['recordingStatusCallback'], 'RecordingStatusCallbackMethod' => $options['recordingStatusCallbackMethod'], 'ConferenceRecordingStatusCallback' => $options['conferenceRecordingStatusCallback'], 'ConferenceRecordingStatusCallbackMethod' => $options['conferenceRecordingStatusCallbackMethod'], 'Region' => $options['region'], 'SipAuthUsername' => $options['sipAuthUsername'], 'SipAuthPassword' => $options['sipAuthPassword'], 'DequeueStatusCallbackEvent' => Serialize::map($options['dequeueStatusCallbackEvent'], function ($e) {
            return $e;
        }), 'PostWorkActivitySid' => $options['postWorkActivitySid'], 'SupervisorMode' => $options['supervisorMode'], 'Supervisor' => $options['supervisor'], 'EndConferenceOnCustomerExit' => Serialize::booleanToString($options['endConferenceOnCustomerExit']), 'BeepOnCustomerEntrance' => Serialize::booleanToString($options['beepOnCustomerEntrance'])]);
        $headers = Values::of(['If-Match' => $options['ifMatch']]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);
        return new ReservationInstance($this->version, $payload, $this->solution['workspaceSid'], $this->solution['taskSid'], $this->solution['sid']);
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
        return '[Twilio.Taskrouter.V1.ReservationContext ' . \implode(' ', $context) . ']';
    }
}
