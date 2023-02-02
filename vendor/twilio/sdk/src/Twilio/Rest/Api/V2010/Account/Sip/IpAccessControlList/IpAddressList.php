<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Api\V2010\Account\Sip\IpAccessControlList;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class IpAddressList extends ListResource
{
    /**
     * Construct the IpAddressList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The unique id of the Account that is responsible
     *                           for this resource.
     * @param string $ipAccessControlListSid The unique id of the
     *                                       IpAccessControlList resource that
     *                                       includes this resource.
     */
    public function __construct(Version $version, string $accountSid, string $ipAccessControlListSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'ipAccessControlListSid' => $ipAccessControlListSid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/SIP/IpAccessControlLists/' . \rawurlencode($ipAccessControlListSid) . '/IpAddresses.json';
    }
    /**
     * Streams IpAddressInstance records from the API as a generator stream.
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
     * Reads IpAddressInstance records from the API as a list.
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
     * @return IpAddressInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of IpAddressInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return IpAddressPage Page of IpAddressInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : IpAddressPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new IpAddressPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of IpAddressInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return IpAddressPage Page of IpAddressInstance
     */
    public function getPage(string $targetUrl) : IpAddressPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new IpAddressPage($this->version, $response, $this->solution);
    }
    /**
     * Create the IpAddressInstance
     *
     * @param string $friendlyName A human readable descriptive text for this
     *                             resource, up to 255 characters long.
     * @param string $ipAddress An IP address in dotted decimal notation from which
     *                          you want to accept traffic. Any SIP requests from
     *                          this IP address will be allowed by Twilio. IPv4
     *                          only supported today.
     * @param array|Options $options Optional Arguments
     * @return IpAddressInstance Created IpAddressInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $friendlyName, string $ipAddress, array $options = []) : IpAddressInstance
    {
        $options = new Values($options);
        $data = Values::of(['FriendlyName' => $friendlyName, 'IpAddress' => $ipAddress, 'CidrPrefixLength' => $options['cidrPrefixLength']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new IpAddressInstance($this->version, $payload, $this->solution['accountSid'], $this->solution['ipAccessControlListSid']);
    }
    /**
     * Constructs a IpAddressContext
     *
     * @param string $sid A string that identifies the IpAddress resource to fetch
     */
    public function getContext(string $sid) : IpAddressContext
    {
        return new IpAddressContext($this->version, $this->solution['accountSid'], $this->solution['ipAccessControlListSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.IpAddressList]';
    }
}
