<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\FlexApi\V1;

use WP2FA_Vendor\Twilio\Http\Response;
use WP2FA_Vendor\Twilio\Page;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class InsightsSettingsCommentPage extends Page
{
    /**
     * @param Version $version Version that contains the resource
     * @param Response $response Response from the API
     * @param array $solution The context solution
     */
    public function __construct(Version $version, Response $response, array $solution)
    {
        parent::__construct($version, $response);
        // Path Solution
        $this->solution = $solution;
    }
    /**
     * @param array $payload Payload response from the API
     * @return InsightsSettingsCommentInstance \Twilio\Rest\FlexApi\V1\InsightsSettingsCommentInstance
     */
    public function buildInstance(array $payload) : InsightsSettingsCommentInstance
    {
        return new InsightsSettingsCommentInstance($this->version, $payload);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.FlexApi.V1.InsightsSettingsCommentPage]';
    }
}
