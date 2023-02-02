<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Autopilot\V1\Assistant;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class StyleSheetOptions
{
    /**
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     * @return UpdateStyleSheetOptions Options builder
     */
    public static function update(array $styleSheet = Values::ARRAY_NONE) : UpdateStyleSheetOptions
    {
        return new UpdateStyleSheetOptions($styleSheet);
    }
}
class UpdateStyleSheetOptions extends Options
{
    /**
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     */
    public function __construct(array $styleSheet = Values::ARRAY_NONE)
    {
        $this->options['styleSheet'] = $styleSheet;
    }
    /**
     * The JSON string that describes the style sheet object.
     *
     * @param array $styleSheet The JSON string that describes the style sheet
     *                          object
     * @return $this Fluent Builder
     */
    public function setStyleSheet(array $styleSheet) : self
    {
        $this->options['styleSheet'] = $styleSheet;
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
        return '[Twilio.Autopilot.V1.UpdateStyleSheetOptions ' . $options . ']';
    }
}
