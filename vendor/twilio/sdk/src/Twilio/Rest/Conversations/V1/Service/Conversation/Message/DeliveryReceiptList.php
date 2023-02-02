<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Conversations\V1\Service\Conversation\Message;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class DeliveryReceiptList extends ListResource
{
    /**
     * Construct the DeliveryReceiptList
     *
     * @param Version $version Version that contains the resource
     * @param string $chatServiceSid The SID of the Conversation Service that the
     *                               resource is associated with.
     * @param string $conversationSid The unique ID of the Conversation for this
     *                                message.
     * @param string $messageSid The SID of the message the delivery receipt
     *                           belongs to
     */
    public function __construct(Version $version, string $chatServiceSid, string $conversationSid, string $messageSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['chatServiceSid' => $chatServiceSid, 'conversationSid' => $conversationSid, 'messageSid' => $messageSid];
        $this->uri = '/Services/' . \rawurlencode($chatServiceSid) . '/Conversations/' . \rawurlencode($conversationSid) . '/Messages/' . \rawurlencode($messageSid) . '/Receipts';
    }
    /**
     * Streams DeliveryReceiptInstance records from the API as a generator stream.
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
     * Reads DeliveryReceiptInstance records from the API as a list.
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
     * @return DeliveryReceiptInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of DeliveryReceiptInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return DeliveryReceiptPage Page of DeliveryReceiptInstance
     */
    public function page($pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : DeliveryReceiptPage
    {
        $params = Values::of(['PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new DeliveryReceiptPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of DeliveryReceiptInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return DeliveryReceiptPage Page of DeliveryReceiptInstance
     */
    public function getPage(string $targetUrl) : DeliveryReceiptPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new DeliveryReceiptPage($this->version, $response, $this->solution);
    }
    /**
     * Constructs a DeliveryReceiptContext
     *
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     */
    public function getContext(string $sid) : DeliveryReceiptContext
    {
        return new DeliveryReceiptContext($this->version, $this->solution['chatServiceSid'], $this->solution['conversationSid'], $this->solution['messageSid'], $sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Conversations.V1.DeliveryReceiptList]';
    }
}
