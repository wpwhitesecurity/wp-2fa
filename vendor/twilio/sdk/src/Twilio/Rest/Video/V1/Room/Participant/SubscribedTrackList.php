<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Video\V1\Room\Participant;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class SubscribedTrackList extends ListResource
{
    /**
     * Construct the SubscribedTrackList
     *
     * @param Version $version Version that contains the resource
     * @param string $roomSid The SID of the room where the track is published
     * @param string $participantSid The SID of the participant that subscribes to
     *                               the track
     */
    public function __construct(Version $version, string $roomSid, string $participantSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['roomSid' => $roomSid, 'participantSid' => $participantSid];
        $this->uri = '/Rooms/' . \rawurlencode($roomSid) . '/Participants/' . \rawurlencode($participantSid) . '/SubscribedTracks';
    }
    /**
     * Streams SubscribedTrackInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null) : Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Reads SubscribedTrackInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return SubscribedTrackInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of SubscribedTrackInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return SubscribedTrackPage Page of SubscribedTrackInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : SubscribedTrackPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new SubscribedTrackPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of SubscribedTrackInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return SubscribedTrackPage Page of SubscribedTrackInstance
     */
    public function getPage(string $targetUrl) : SubscribedTrackPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new SubscribedTrackPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a SubscribedTrackContext
     *
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function getContext(string $sid) : SubscribedTrackContext
    {
        return new SubscribedTrackContext($this->version, $this->solution['roomSid'], $this->solution['participantSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Video.V1.SubscribedTrackList]';
    }
}