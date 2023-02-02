<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Pricing;

use WP2FA_Vendor\Twilio\Domain;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Rest\Pricing\V1\MessagingList;
use WP2FA_Vendor\Twilio\Rest\Pricing\V1\PhoneNumberList;
use WP2FA_Vendor\Twilio\Rest\Pricing\V1\VoiceList;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property MessagingList $messaging
 * @property PhoneNumberList $phoneNumbers
 * @property VoiceList $voice
 */
class V1 extends Version
{
    protected $_messaging;
    protected $_phoneNumbers;
    protected $_voice;
    /**
     * Construct the V1 version of Pricing
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    protected function getMessaging() : MessagingList
    {
        if (!$this->_messaging) {
            $this->_messaging = new MessagingList($this);
        }
        return $this->_messaging;
    }
    protected function getPhoneNumbers() : PhoneNumberList
    {
        if (!$this->_phoneNumbers) {
            $this->_phoneNumbers = new PhoneNumberList($this);
        }
        return $this->_phoneNumbers;
    }
    protected function getVoice() : VoiceList
    {
        if (!$this->_voice) {
            $this->_voice = new VoiceList($this);
        }
        return $this->_voice;
    }
    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new TwilioException('Unknown resource ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) : InstanceContext
    {
        $property = $this->{$name};
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }
        throw new TwilioException('Resource does not have a context');
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Pricing.V1]';
    }
}
