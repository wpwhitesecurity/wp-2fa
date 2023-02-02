<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Preview\HostedNumbers;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class AuthorizationDocumentList extends ListResource
{
    /**
     * Construct the AuthorizationDocumentList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
        $this->uri = '/AuthorizationDocuments';
    }
    /**
     * Streams AuthorizationDocumentInstance records from the API as a generator
     * stream.
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
     * Reads AuthorizationDocumentInstance records from the API as a list.
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
     * @return AuthorizationDocumentInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of AuthorizationDocumentInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return AuthorizationDocumentPage Page of AuthorizationDocumentInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : AuthorizationDocumentPage
    {
        $options = new Values($options);
        $params = Values::of(['Email' => $options['email'], 'Status' => $options['status'], 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new AuthorizationDocumentPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of AuthorizationDocumentInstance records from the
     * API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return AuthorizationDocumentPage Page of AuthorizationDocumentInstance
     */
    public function getPage(string $targetUrl) : AuthorizationDocumentPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new AuthorizationDocumentPage($this->version, $response, $this->solution);
    }
    /**
     * Create the AuthorizationDocumentInstance
     *
     * @param string[] $hostedNumberOrderSids A list of HostedNumberOrder sids.
     * @param string $addressSid Address sid.
     * @param string $email Email.
     * @param string $contactTitle Title of signee of this Authorization Document.
     * @param string $contactPhoneNumber Authorization Document's signee's phone
     *                                   number.
     * @param array|Options $options Optional Arguments
     * @return AuthorizationDocumentInstance Created AuthorizationDocumentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $hostedNumberOrderSids, string $addressSid, string $email, string $contactTitle, string $contactPhoneNumber, array $options = []) : AuthorizationDocumentInstance
    {
        $options = new Values($options);
        $data = Values::of(['HostedNumberOrderSids' => Serialize::map($hostedNumberOrderSids, function ($e) {
            return $e;
        }), 'AddressSid' => $addressSid, 'Email' => $email, 'ContactTitle' => $contactTitle, 'ContactPhoneNumber' => $contactPhoneNumber, 'CcEmails' => Serialize::map($options['ccEmails'], function ($e) {
            return $e;
        })]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new AuthorizationDocumentInstance($this->version, $payload);
    }
    /**
     * Constructs a AuthorizationDocumentContext
     *
     * @param string $sid AuthorizationDocument sid.
     */
    public function getContext(string $sid) : AuthorizationDocumentContext
    {
        return new AuthorizationDocumentContext($this->version, $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Preview.HostedNumbers.AuthorizationDocumentList]';
    }
}