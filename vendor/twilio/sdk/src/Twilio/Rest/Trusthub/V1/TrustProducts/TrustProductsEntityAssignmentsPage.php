<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Trusthub\V1\TrustProducts;

use WP2FA_Vendor\Twilio\Http\Response;
use WP2FA_Vendor\Twilio\Page;
use WP2FA_Vendor\Twilio\Version;
class TrustProductsEntityAssignmentsPage extends Page
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
     * @return TrustProductsEntityAssignmentsInstance \Twilio\Rest\Trusthub\V1\TrustProducts\TrustProductsEntityAssignmentsInstance
     */
    public function buildInstance(array $payload) : TrustProductsEntityAssignmentsInstance
    {
        return new TrustProductsEntityAssignmentsInstance($this->version, $payload, $this->solution['trustProductSid']);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Trusthub.V1.TrustProductsEntityAssignmentsPage]';
    }
}