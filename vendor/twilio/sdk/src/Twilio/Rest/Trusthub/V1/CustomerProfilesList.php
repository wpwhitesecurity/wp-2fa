<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Trusthub\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class CustomerProfilesList extends ListResource
{
    /**
     * Construct the CustomerProfilesList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/CustomerProfiles';
    }
    /**
     * Create the CustomerProfilesInstance
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $email The email address
     * @param string $policySid The unique string of a policy.
     * @param array|Options $options Optional Arguments
     * @return CustomerProfilesInstance Created CustomerProfilesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $friendlyName, string $email, string $policySid, array $options = []) : CustomerProfilesInstance
    {
        $options = new Values($options);
        $data = Values::of(['FriendlyName' => $friendlyName, 'Email' => $email, 'PolicySid' => $policySid, 'StatusCallback' => $options['statusCallback']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new CustomerProfilesInstance($this->version, $payload);
    }
    /**
     * Streams CustomerProfilesInstance records from the API as a generator stream.
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
     * Reads CustomerProfilesInstance records from the API as a list.
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
     * @return CustomerProfilesInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of CustomerProfilesInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return CustomerProfilesPage Page of CustomerProfilesInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : CustomerProfilesPage
    {
        $options = new Values($options);
        $params = Values::of(['Status' => $options['status'], 'FriendlyName' => $options['friendlyName'], 'PolicySid' => $options['policySid'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new CustomerProfilesPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of CustomerProfilesInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return CustomerProfilesPage Page of CustomerProfilesInstance
     */
    public function getPage(string $targetUrl) : CustomerProfilesPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new CustomerProfilesPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a CustomerProfilesContext
     *
     * @param string $sid The unique string that identifies the resource.
     */
    public function getContext(string $sid) : CustomerProfilesContext
    {
        return new CustomerProfilesContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Trusthub.V1.CustomerProfilesList]';
    }
}