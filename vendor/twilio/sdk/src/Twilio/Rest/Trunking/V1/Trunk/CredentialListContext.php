<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Trunking\V1\Trunk;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class CredentialListContext extends InstanceContext
{
    /**
     * Initialize the CredentialListContext
     *
     * @param Version $version Version that contains the resource
     * @param string $trunkSid The SID of the Trunk from which to fetch the
     *                         credential list
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, $trunkSid, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['trunkSid' => $trunkSid, 'sid' => $sid];
        $this->uri = '/Trunks/' . \rawurlencode($trunkSid) . '/CredentialLists/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the CredentialListInstance
     *
     * @return CredentialListInstance Fetched CredentialListInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : CredentialListInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new CredentialListInstance($this->version, $payload, $this->solution['trunkSid'], $this->solution['sid']);
    }
    /**
     * Delete the CredentialListInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->version->delete('DELETE', $this->uri);
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
        return '[Twilio.Trunking.V1.CredentialListContext ' . \implode(' ', $context) . ']';
    }
}
