<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry;

use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Stream;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class LocalList extends ListResource
{
    /**
     * Construct the LocalList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $countryCode The ISO-3166-1 country code of the country.
     */
    public function __construct(Version $version, string $accountSid, string $countryCode)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'countryCode' => $countryCode];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/AvailablePhoneNumbers/' . \rawurlencode($countryCode) . '/Local.json';
    }
    /**
     * Streams LocalInstance records from the API as a generator stream.
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
     * Reads LocalInstance records from the API as a list.
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
     * @return LocalInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null) : array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), \false);
    }
    /**
     * Retrieve a single page of LocalInstance records from the API.
     * Request is executed immediately
     *
     * @param array|Options $options Optional Arguments
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return LocalPage Page of LocalInstance
     */
    public function page(array $options = [], $pageSize = Values::NONE, string $pageToken = Values::NONE, $pageNumber = Values::NONE) : LocalPage
    {
        $options = new Values($options);
        $params = Values::of(['AreaCode' => $options['areaCode'], 'Contains' => $options['contains'], 'SmsEnabled' => Serialize::booleanToString($options['smsEnabled']), 'MmsEnabled' => Serialize::booleanToString($options['mmsEnabled']), 'VoiceEnabled' => Serialize::booleanToString($options['voiceEnabled']), 'ExcludeAllAddressRequired' => Serialize::booleanToString($options['excludeAllAddressRequired']), 'ExcludeLocalAddressRequired' => Serialize::booleanToString($options['excludeLocalAddressRequired']), 'ExcludeForeignAddressRequired' => Serialize::booleanToString($options['excludeForeignAddressRequired']), 'Beta' => Serialize::booleanToString($options['beta']), 'NearNumber' => $options['nearNumber'], 'NearLatLong' => $options['nearLatLong'], 'Distance' => $options['distance'], 'InPostalCode' => $options['inPostalCode'], 'InRegion' => $options['inRegion'], 'InRateCenter' => $options['inRateCenter'], 'InLata' => $options['inLata'], 'InLocality' => $options['inLocality'], 'FaxEnabled' => Serialize::booleanToString($options['faxEnabled']), 'PageToken' => $pageToken, 'Page' => $pageNumber, 'PageSize' => $pageSize]);
        $response = $this->version->page('GET', $this->uri, $params);
        return new LocalPage($this->version, $response, $this->solution);
    }
    /**
     * Retrieve a specific page of LocalInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return LocalPage Page of LocalInstance
     */
    public function getPage(string $targetUrl) : LocalPage
    {
        $response = $this->version->getDomain()->getClient()->request('GET', $targetUrl);
        return new LocalPage($this->version, $response, $this->solution);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.LocalList]';
    }
}
