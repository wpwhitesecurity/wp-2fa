<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\IpMessaging\V1\Service;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class UserList extends ListResource
{
    /**
     * Construct the UserList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     */
    public function __construct(Version $version, string $serviceSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Users';
    }
    /**
     * Create the UserInstance
     *
     * @param string $identity The identity
     * @param array|Options $options Optional Arguments
     * @return UserInstance Created UserInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $identity, array $options = []) : UserInstance
    {
        $options = new Values($options);
        $data = Values::of(['Identity' => $identity, 'RoleSid' => $options['roleSid'], 'Attributes' => $options['attributes'], 'FriendlyName' => $options['friendlyName']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new UserInstance($this->version, $payload, $this->solution['serviceSid']);
    }
    /**
     * Streams UserInstance records from the API as a generator stream.
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
     * Reads UserInstance records from the API as a list.
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
     * @return UserInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of UserInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return UserPage Page of UserInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : UserPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new UserPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of UserInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return UserPage Page of UserInstance
     */
    public function getPage(string $targetUrl) : UserPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new UserPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a UserContext
     *
     * @param string $sid The sid
     */
    public function getContext(string $sid) : UserContext
    {
        return new UserContext($this->version, $this->solution['serviceSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.IpMessaging.V1.UserList]';
    }
}