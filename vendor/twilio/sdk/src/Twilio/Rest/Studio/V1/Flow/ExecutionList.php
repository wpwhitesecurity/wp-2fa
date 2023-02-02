<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Studio\V1\Flow;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class ExecutionList extends ListResource
{
    /**
     * Construct the ExecutionList
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Flow
     */
    public function __construct(Version $version, string $flowSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['flowSid' => $flowSid];
        $this->uri = '/Flows/' . \rawurlencode($flowSid) . '/Executions';
    }
    /**
     * Streams ExecutionInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
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
    public function stream(array $options = [], int $limit = null, $pageSize = null) : Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);
        $page = $this->page($options, $limits['pageSize']);
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }
    /**
     * Reads ExecutionInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return ExecutionInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return ExecutionPage Page of ExecutionInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : ExecutionPage
    {
        $options = new Values($options);
        $params = Values::of(['DateCreatedFrom' => Serialize::iso8601DateTime($options['dateCreatedFrom']), 'DateCreatedTo' => Serialize::iso8601DateTime($options['dateCreatedTo']), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new ExecutionPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of ExecutionInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return ExecutionPage Page of ExecutionInstance
     */
    public function getPage(string $targetUrl) : ExecutionPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new ExecutionPage($this->version, $response, $this->solution);
    }
    /**
     * Create the ExecutionInstance
     *
     * @param string $to The Contact phone number to start a Studio Flow Execution
     * @param string $from The Twilio phone number or Messaging Service SID to send
     *                     messages or initiate calls from during the Flow Execution
     * @param array|Options $options Optional Arguments
     * @return ExecutionInstance Created ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $to, string $from, array $options = []) : ExecutionInstance
    {
        $options = new Values($options);
        $data = Values::of(['To' => $to, 'From' => $from, 'Parameters' => Serialize::jsonObject($options['parameters'])]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new ExecutionInstance($this->version, $payload, $this->solution['flowSid']);
    }
    /**
     * Constructs a ExecutionContext
     *
     * @param string $sid The SID of the Execution resource to fetch
     */
    public function getContext(string $sid) : ExecutionContext
    {
        return new ExecutionContext($this->version, $this->solution['flowSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Studio.V1.ExecutionList]';
    }
}
