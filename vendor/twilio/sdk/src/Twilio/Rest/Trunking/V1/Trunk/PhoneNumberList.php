<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Trunking\V1\Trunk;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class PhoneNumberList extends ListResource
{
    /**
     * Construct the PhoneNumberList
     *
     * @param Version $version Version that contains the resource
     * @param string $trunkSid The SID of the Trunk that handles calls to the phone
     *                         number
     */
    public function __construct(Version $version, string $trunkSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['trunkSid' => $trunkSid];
        $this->uri = '/Trunks/' . \rawurlencode($trunkSid) . '/PhoneNumbers';
    }
    /**
     * Create the PhoneNumberInstance
     *
     * @param string $phoneNumberSid The SID of the Incoming Phone Number that you
     *                               want to associate with the trunk
     * @return PhoneNumberInstance Created PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $phoneNumberSid) : PhoneNumberInstance
    {
        $data = Values::of(['PhoneNumberSid' => $phoneNumberSid]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new PhoneNumberInstance($this->version, $payload, $this->solution['trunkSid']);
    }
    /**
     * Streams PhoneNumberInstance records from the API as a generator stream.
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
     * Reads PhoneNumberInstance records from the API as a list.
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
     * @return PhoneNumberInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of PhoneNumberInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return PhoneNumberPage Page of PhoneNumberInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : PhoneNumberPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new PhoneNumberPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of PhoneNumberInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return PhoneNumberPage Page of PhoneNumberInstance
     */
    public function getPage(string $targetUrl) : PhoneNumberPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new PhoneNumberPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a PhoneNumberContext
     *
     * @param string $sid The unique string that identifies the resource
     */
    public function getContext(string $sid) : PhoneNumberContext
    {
        return new PhoneNumberContext($this->version, $this->solution['trunkSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Trunking.V1.PhoneNumberList]';
    }
}
