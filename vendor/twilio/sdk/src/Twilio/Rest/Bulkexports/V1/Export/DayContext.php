<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Bulkexports\V1\Export;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class DayContext extends InstanceContext
{
    /**
     * Initialize the DayContext
     *
     * @param Version $version Version that contains the resource
     * @param string $resourceType The type of communication – Messages, Calls,
     *                             Conferences, and Participants
     * @param string $day The date of the data in the file
     */
    public function __construct(Version $version, $resourceType, $day)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['resourceType' => $resourceType, 'day' => $day];
        $this->uri = '/Exports/' . \rawurlencode($resourceType) . '/Days/' . \rawurlencode($day) . '';
    }
    /**
     * Fetch the DayInstance
     *
     * @return DayInstance Fetched DayInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : DayInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new DayInstance($this->version, $payload, $this->solution['resourceType'], $this->solution['day']);
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
        return '[Twilio.Bulkexports.V1.DayContext ' . \implode(' ', $context) . ']';
    }
}
