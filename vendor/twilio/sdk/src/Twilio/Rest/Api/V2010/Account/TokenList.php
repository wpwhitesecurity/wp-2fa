<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Api\V2010\Account;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class TokenList extends ListResource
{
    /**
     * Construct the TokenList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     */
    public function __construct(Version $version, string $accountSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['accountSid' => $accountSid];
        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Tokens.json';
    }
    /**
     * Create the TokenInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TokenInstance Created TokenInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(array $options = []) : TokenInstance
    {
        $options = new Values($options);
        $data = Values::of(['Ttl' => $options['ttl']]);
        $payload = $this->version->create('POST', $this->uri, [], $data);
        return new TokenInstance($this->version, $payload, $this->solution['accountSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Api.V2010.TokenList]';
    }
}
