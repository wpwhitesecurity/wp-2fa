<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Messaging\V1\Service;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class UsAppToPersonOptions
{
    /**
     * @param string $optInMessage Opt In Message
     * @param string $optOutMessage Opt Out Message
     * @param string $helpMessage Help Message
     * @param string[] $optInKeywords Opt In Keywords
     * @param string[] $optOutKeywords Opt Out Keywords
     * @param string[] $helpKeywords Help Keywords
     * @return CreateUsAppToPersonOptions Options builder
     */
    public static function create(string $optInMessage = Values::NONE, string $optOutMessage = Values::NONE, string $helpMessage = Values::NONE, array $optInKeywords = Values::ARRAY_NONE, array $optOutKeywords = Values::ARRAY_NONE, array $helpKeywords = Values::ARRAY_NONE) : CreateUsAppToPersonOptions
    {
        return new CreateUsAppToPersonOptions($optInMessage, $optOutMessage, $helpMessage, $optInKeywords, $optOutKeywords, $helpKeywords);
    }
}
class CreateUsAppToPersonOptions extends Options
{
    /**
     * @param string $optInMessage Opt In Message
     * @param string $optOutMessage Opt Out Message
     * @param string $helpMessage Help Message
     * @param string[] $optInKeywords Opt In Keywords
     * @param string[] $optOutKeywords Opt Out Keywords
     * @param string[] $helpKeywords Help Keywords
     */
    public function __construct(string $optInMessage = Values::NONE, string $optOutMessage = Values::NONE, string $helpMessage = Values::NONE, array $optInKeywords = Values::ARRAY_NONE, array $optOutKeywords = Values::ARRAY_NONE, array $helpKeywords = Values::ARRAY_NONE)
    {
        $this->options['optInMessage'] = $optInMessage;
        $this->options['optOutMessage'] = $optOutMessage;
        $this->options['helpMessage'] = $helpMessage;
        $this->options['optInKeywords'] = $optInKeywords;
        $this->options['optOutKeywords'] = $optOutKeywords;
        $this->options['helpKeywords'] = $helpKeywords;
    }
    /**
     * If end users can text in a keyword to start receiving messages from this campaign, the auto-reply messages sent to the end users must be provided. The opt-in response should include the Brand name, confirmation of opt-in enrollment to a recurring message campaign, how to get help, and clear description of how to opt-out. This field is required if end users can text in a keyword to start receiving messages from this campaign. 20 character minimum. 320 character maximum.
     *
     * @param string $optInMessage Opt In Message
     * @return $this Fluent Builder
     */
    public function setOptInMessage(string $optInMessage) : self
    {
        $this->options['optInMessage'] = $optInMessage;
        return $this;
    }
    /**
     * Upon receiving the opt-out keywords from the end users, Twilio customers are expected to send back an auto-generated response, which must provide acknowledgment of the opt-out request and confirmation that no further messages will be sent. It is also recommended that these opt-out messages include the brand name. This field is required if managing opt out keywords yourself (i.e. not using Twilio's Default or Advanced Opt Out features). 20 character minimum. 320 character maximum.
     *
     * @param string $optOutMessage Opt Out Message
     * @return $this Fluent Builder
     */
    public function setOptOutMessage(string $optOutMessage) : self
    {
        $this->options['optOutMessage'] = $optOutMessage;
        return $this;
    }
    /**
     * When customers receive the help keywords from their end users, Twilio customers are expected to send back an auto-generated response; this may include the brand name and additional support contact information. This field is required if managing help keywords yourself (i.e. not using Twilio's Default or Advanced Opt Out features). 20 character minimum. 320 character maximum.
     *
     * @param string $helpMessage Help Message
     * @return $this Fluent Builder
     */
    public function setHelpMessage(string $helpMessage) : self
    {
        $this->options['helpMessage'] = $helpMessage;
        return $this;
    }
    /**
     * If end users can text in a keyword to start receiving messages from this campaign, those keywords must be provided. This field is required if end users can text in a keyword to start receiving messages from this campaign. Values must be alphanumeric. 255 character maximum.
     *
     * @param string[] $optInKeywords Opt In Keywords
     * @return $this Fluent Builder
     */
    public function setOptInKeywords(array $optInKeywords) : self
    {
        $this->options['optInKeywords'] = $optInKeywords;
        return $this;
    }
    /**
     * End users should be able to text in a keyword to stop receiving messages from this campaign. Those keywords must be provided. This field is required if managing opt out keywords yourself (i.e. not using Twilio's Default or Advanced Opt Out features). Values must be alphanumeric. 255 character maximum.
     *
     * @param string[] $optOutKeywords Opt Out Keywords
     * @return $this Fluent Builder
     */
    public function setOptOutKeywords(array $optOutKeywords) : self
    {
        $this->options['optOutKeywords'] = $optOutKeywords;
        return $this;
    }
    /**
     * End users should be able to text in a keyword to receive help. Those keywords must be provided as part of the campaign registration request. This field is required if managing help keywords yourself (i.e. not using Twilio's Default or Advanced Opt Out features). Values must be alphanumeric. 255 character maximum.
     *
     * @param string[] $helpKeywords Help Keywords
     * @return $this Fluent Builder
     */
    public function setHelpKeywords(array $helpKeywords) : self
    {
        $this->options['helpKeywords'] = $helpKeywords;
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
        return '[Twilio.Messaging.V1.CreateUsAppToPersonOptions ' . $options . ']';
    }
}
