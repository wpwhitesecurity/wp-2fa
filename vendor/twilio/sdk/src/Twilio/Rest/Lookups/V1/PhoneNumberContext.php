<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Lookups\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class PhoneNumberContext extends InstanceContext
{
    /**
     * Initialize the PhoneNumberContext
     *
     * @param Version $version Version that contains the resource
     * @param string $phoneNumber The phone number to fetch in E.164 format
     */
    public function __construct(Version $version, $phoneNumber)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['phoneNumber' => $phoneNumber];
        $this->uri = '/PhoneNumbers/' . \rawurlencode($phoneNumber) . '';
    }
    /**
     * Fetch the PhoneNumberInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []) : PhoneNumberInstance
    {
        $options = new Values($options);
        $params = Values::of(['CountryCode' => $options['countryCode'], 'Type' => Serialize::map($options['type'], function ($e) {
            return $e;
        }), 'AddOns' => Serialize::map($options['addOns'], function ($e) {
            return $e;
        })]);
        $params = \array_merge($params, Serialize::prefixedCollapsibleMap($options['addOnsData'], 'AddOns'));
        $payload = $this->version->fetch('GET', $this->uri, $params);
        return new PhoneNumberInstance($this->version, $payload, $this->solution['phoneNumber']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Lookups.V1.PhoneNumberContext ' . \implode(' ', $context) . ']';
    }
}
