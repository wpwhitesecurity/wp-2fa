<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Bulkexports\V1\Export;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class DayList extends ListResource
{
    /**
     * Construct the DayList
     *
     * @param Version $version Version that contains the resource
     * @param string $resourceType The type of communication – Messages, Calls,
     *                             Conferences, and Participants
     */
    public function __construct(Version $version, string $resourceType)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['resourceType' => $resourceType];
        $this->uri = '/Exports/' . \rawurlencode($resourceType) . '/Days';
    }
    /**
     * Streams DayInstance records from the API as a generator stream.
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
     * Reads DayInstance records from the API as a list.
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
     * @return DayInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of DayInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return DayPage Page of DayInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : DayPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new DayPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of DayInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return DayPage Page of DayInstance
     */
    public function getPage(string $targetUrl) : DayPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new DayPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a DayContext
     *
     * @param string $day The date of the data in the file
     */
    public function getContext(string $day) : DayContext
    {
        return new DayContext($this->version, $this->solution['resourceType'], $day);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Bulkexports.V1.DayList]';
    }
}