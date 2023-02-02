<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Insights\V1\Call;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class MetricOptions
{
    /**
     * @param string $edge The edge
     * @param string $direction The direction
     * @return ReadMetricOptions Options builder
     */
    public static function read(string $edge = Values::NONE, string $direction = Values::NONE) : ReadMetricOptions
    {
        return new ReadMetricOptions($edge, $direction);
    }
}
class ReadMetricOptions extends Options
{
    /**
     * @param string $edge The edge
     * @param string $direction The direction
     */
    public function __construct(string $edge = Values::NONE, string $direction = Values::NONE)
    {
        $this->options['edge'] = $edge;
        $this->options['direction'] = $direction;
    }
    /**
     * The edge
     *
     * @param string $edge The edge
     * @return $this Fluent Builder
     */
    public function setEdge(string $edge) : self
    {
        $this->options['edge'] = $edge;
        return $this;
    }
    /**
     * The direction
     *
     * @param string $direction The direction
     * @return $this Fluent Builder
     */
    public function setDirection(string $direction) : self
    {
        $this->options['direction'] = $direction;
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
        return '[Twilio.Insights.V1.ReadMetricOptions ' . $options . ']';
    }
}
