<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Messaging\V1\BrandRegistration;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class BrandVettingOptions
{
    /**
     * @param string $vettingId The unique ID of the vetting
     * @return CreateBrandVettingOptions Options builder
     */
    public static function create(string $vettingId = Values::NONE) : CreateBrandVettingOptions
    {
        return new CreateBrandVettingOptions($vettingId);
    }
    /**
     * @param string $vettingProvider Third-party provider of the vettings to create
     * @return ReadBrandVettingOptions Options builder
     */
    public static function read(string $vettingProvider = Values::NONE) : ReadBrandVettingOptions
    {
        return new ReadBrandVettingOptions($vettingProvider);
    }
}
class CreateBrandVettingOptions extends Options
{
    /**
     * @param string $vettingId The unique ID of the vetting
     */
    public function __construct(string $vettingId = Values::NONE)
    {
        $this->options['vettingId'] = $vettingId;
    }
    /**
     * The unique ID of the vetting
     *
     * @param string $vettingId The unique ID of the vetting
     * @return $this Fluent Builder
     */
    public function setVettingId(string $vettingId) : self
    {
        $this->options['vettingId'] = $vettingId;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Messaging.V1.CreateBrandVettingOptions ' . $options . ']';
    }
}
class ReadBrandVettingOptions extends Options
{
    /**
     * @param string $vettingProvider Third-party provider of the vettings to create
     */
    public function __construct(string $vettingProvider = Values::NONE)
    {
        $this->options['vettingProvider'] = $vettingProvider;
    }
    /**
     * The third-party provider of the vettings to read
     *
     * @param string $vettingProvider Third-party provider of the vettings to create
     * @return $this Fluent Builder
     */
    public function setVettingProvider(string $vettingProvider) : self
    {
        $this->options['vettingProvider'] = $vettingProvider;
        return $this;
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Messaging.V1.ReadBrandVettingOptions ' . $options . ']';
    }
}
