<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Video\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class CompositionContext extends InstanceContext
{
    /**
     * Initialize the CompositionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, $sid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['sid' => $sid];
        $this->uri = '/Compositions/' . \rawurlencode($sid) . '';
    }
    /**
     * Fetch the CompositionInstance
     *
     * @return CompositionInstance Fetched CompositionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : CompositionInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new CompositionInstance($this->version, $payload, $this->solution['sid']);
    }
    /**
     * Delete the CompositionInstance
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
        return '[Twilio.Video.V1.CompositionContext ' . \implode(' ', $context) . ']';
    }
}