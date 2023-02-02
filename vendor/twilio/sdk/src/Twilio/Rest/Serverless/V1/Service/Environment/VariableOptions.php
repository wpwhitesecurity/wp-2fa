<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Serverless\V1\Service\Environment;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class VariableOptions
{
    /**
     * @param string $key A string by which the Variable resource can be referenced
     * @param string $value A string that contains the actual value of the Variable
     * @return UpdateVariableOptions Options builder
     */
    public static function update(string $key = Values::NONE, string $value = Values::NONE) : UpdateVariableOptions
    {
        return new UpdateVariableOptions($key, $value);
    }
}
class UpdateVariableOptions extends Options
{
    /**
     * @param string $key A string by which the Variable resource can be referenced
     * @param string $value A string that contains the actual value of the Variable
     */
    public function __construct(string $key = Values::NONE, string $value = Values::NONE)
    {
        $this->options['key'] = $key;
        $this->options['value'] = $value;
    }
    /**
     * A string by which the Variable resource can be referenced. It can be a maximum of 128 characters.
     *
     * @param string $key A string by which the Variable resource can be referenced
     * @return $this Fluent Builder
     */
    public function setKey(string $key) : self
    {
        $this->options['key'] = $key;
        return $this;
    }
    /**
     * A string that contains the actual value of the Variable. It can be a maximum of 450 bytes in size.
     *
     * @param string $value A string that contains the actual value of the Variable
     * @return $this Fluent Builder
     */
    public function setValue(string $value) : self
    {
        $this->options['value'] = $value;
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
        return '[Twilio.Serverless.V1.UpdateVariableOptions ' . $options . ']';
    }
}
