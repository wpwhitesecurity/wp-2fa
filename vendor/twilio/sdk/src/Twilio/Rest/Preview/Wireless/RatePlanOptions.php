<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Preview\Wireless;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class RatePlanOptions
{
    /**
     * @param string $uniqueName The unique_name
     * @param string $friendlyName The friendly_name
     * @param bool $dataEnabled The data_enabled
     * @param int $dataLimit The data_limit
     * @param string $dataMetering The data_metering
     * @param bool $messagingEnabled The messaging_enabled
     * @param bool $voiceEnabled The voice_enabled
     * @param bool $commandsEnabled The commands_enabled
     * @param bool $nationalRoamingEnabled The national_roaming_enabled
     * @param string[] $internationalRoaming The international_roaming
     * @return CreateRatePlanOptions Options builder
     */
    public static function create(string $uniqueName = Values::NONE, string $friendlyName = Values::NONE, bool $dataEnabled = Values::NONE, int $dataLimit = Values::NONE, string $dataMetering = Values::NONE, bool $messagingEnabled = Values::NONE, bool $voiceEnabled = Values::NONE, bool $commandsEnabled = Values::NONE, bool $nationalRoamingEnabled = Values::NONE, array $internationalRoaming = Values::ARRAY_NONE) : CreateRatePlanOptions
    {
        return new CreateRatePlanOptions($uniqueName, $friendlyName, $dataEnabled, $dataLimit, $dataMetering, $messagingEnabled, $voiceEnabled, $commandsEnabled, $nationalRoamingEnabled, $internationalRoaming);
    }
    /**
     * @param string $uniqueName The unique_name
     * @param string $friendlyName The friendly_name
     * @return UpdateRatePlanOptions Options builder
     */
    public static function update(string $uniqueName = Values::NONE, string $friendlyName = Values::NONE) : UpdateRatePlanOptions
    {
        return new UpdateRatePlanOptions($uniqueName, $friendlyName);
    }
}
class CreateRatePlanOptions extends Options
{
    /**
     * @param string $uniqueName The unique_name
     * @param string $friendlyName The friendly_name
     * @param bool $dataEnabled The data_enabled
     * @param int $dataLimit The data_limit
     * @param string $dataMetering The data_metering
     * @param bool $messagingEnabled The messaging_enabled
     * @param bool $voiceEnabled The voice_enabled
     * @param bool $commandsEnabled The commands_enabled
     * @param bool $nationalRoamingEnabled The national_roaming_enabled
     * @param string[] $internationalRoaming The international_roaming
     */
    public function __construct(string $uniqueName = Values::NONE, string $friendlyName = Values::NONE, bool $dataEnabled = Values::NONE, int $dataLimit = Values::NONE, string $dataMetering = Values::NONE, bool $messagingEnabled = Values::NONE, bool $voiceEnabled = Values::NONE, bool $commandsEnabled = Values::NONE, bool $nationalRoamingEnabled = Values::NONE, array $internationalRoaming = Values::ARRAY_NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['dataEnabled'] = $dataEnabled;
        $this->options['dataLimit'] = $dataLimit;
        $this->options['dataMetering'] = $dataMetering;
        $this->options['messagingEnabled'] = $messagingEnabled;
        $this->options['voiceEnabled'] = $voiceEnabled;
        $this->options['commandsEnabled'] = $commandsEnabled;
        $this->options['nationalRoamingEnabled'] = $nationalRoamingEnabled;
        $this->options['internationalRoaming'] = $internationalRoaming;
    }
    /**
     * The unique_name
     *
     * @param string $uniqueName The unique_name
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName) : self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }
    /**
     * The friendly_name
     *
     * @param string $friendlyName The friendly_name
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The data_enabled
     *
     * @param bool $dataEnabled The data_enabled
     * @return $this Fluent Builder
     */
    public function setDataEnabled(bool $dataEnabled) : self
    {
        $this->options['dataEnabled'] = $dataEnabled;
        return $this;
    }
    /**
     * The data_limit
     *
     * @param int $dataLimit The data_limit
     * @return $this Fluent Builder
     */
    public function setDataLimit(int $dataLimit) : self
    {
        $this->options['dataLimit'] = $dataLimit;
        return $this;
    }
    /**
     * The data_metering
     *
     * @param string $dataMetering The data_metering
     * @return $this Fluent Builder
     */
    public function setDataMetering(string $dataMetering) : self
    {
        $this->options['dataMetering'] = $dataMetering;
        return $this;
    }
    /**
     * The messaging_enabled
     *
     * @param bool $messagingEnabled The messaging_enabled
     * @return $this Fluent Builder
     */
    public function setMessagingEnabled(bool $messagingEnabled) : self
    {
        $this->options['messagingEnabled'] = $messagingEnabled;
        return $this;
    }
    /**
     * The voice_enabled
     *
     * @param bool $voiceEnabled The voice_enabled
     * @return $this Fluent Builder
     */
    public function setVoiceEnabled(bool $voiceEnabled) : self
    {
        $this->options['voiceEnabled'] = $voiceEnabled;
        return $this;
    }
    /**
     * The commands_enabled
     *
     * @param bool $commandsEnabled The commands_enabled
     * @return $this Fluent Builder
     */
    public function setCommandsEnabled(bool $commandsEnabled) : self
    {
        $this->options['commandsEnabled'] = $commandsEnabled;
        return $this;
    }
    /**
     * The national_roaming_enabled
     *
     * @param bool $nationalRoamingEnabled The national_roaming_enabled
     * @return $this Fluent Builder
     */
    public function setNationalRoamingEnabled(bool $nationalRoamingEnabled) : self
    {
        $this->options['nationalRoamingEnabled'] = $nationalRoamingEnabled;
        return $this;
    }
    /**
     * The international_roaming
     *
     * @param string[] $internationalRoaming The international_roaming
     * @return $this Fluent Builder
     */
    public function setInternationalRoaming(array $internationalRoaming) : self
    {
        $this->options['internationalRoaming'] = $internationalRoaming;
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
        return '[Twilio.Preview.Wireless.CreateRatePlanOptions ' . $options . ']';
    }
}
class UpdateRatePlanOptions extends Options
{
    /**
     * @param string $uniqueName The unique_name
     * @param string $friendlyName The friendly_name
     */
    public function __construct(string $uniqueName = Values::NONE, string $friendlyName = Values::NONE)
    {
        $this->options['uniqueName'] = $uniqueName;
        $this->options['friendlyName'] = $friendlyName;
    }
    /**
     * The unique_name
     *
     * @param string $uniqueName The unique_name
     * @return $this Fluent Builder
     */
    public function setUniqueName(string $uniqueName) : self
    {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }
    /**
     * The friendly_name
     *
     * @param string $friendlyName The friendly_name
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
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
        return '[Twilio.Preview.Wireless.UpdateRatePlanOptions ' . $options . ']';
    }
}
