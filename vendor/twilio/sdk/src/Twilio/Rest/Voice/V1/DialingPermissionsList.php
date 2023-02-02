<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Voice\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\ListResource;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\DialingPermissions\BulkCountryUpdateList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\DialingPermissions\CountryList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\DialingPermissions\SettingsList;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property CountryList $countries
 * @property SettingsList $settings
 * @property BulkCountryUpdateList $bulkCountryUpdates
 * @method \Twilio\Rest\Voice\V1\DialingPermissions\CountryContext countries(string $isoCode)
 * @method \Twilio\Rest\Voice\V1\DialingPermissions\SettingsContext settings()
 */
class DialingPermissionsList extends ListResource
{
    protected $_countries = null;
    protected $_settings = null;
    protected $_bulkCountryUpdates = null;
    /**
     * Construct the DialingPermissionsList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = [];
    }
    /**
     * Access the countries
     */
    protected function getCountries() : CountryList
    {
        if (!$this->_countries) {
            $this->_countries = new CountryList($this->version);
        }
        return $this->_countries;
    }
    /**
     * Access the settings
     */
    protected function getSettings() : SettingsList
    {
        if (!$this->_settings) {
            $this->_settings = new SettingsList($this->version);
        }
        return $this->_settings;
    }
    /**
     * Access the bulkCountryUpdates
     */
    protected function getBulkCountryUpdates() : BulkCountryUpdateList
    {
        if (!$this->_bulkCountryUpdates) {
            $this->_bulkCountryUpdates = new BulkCountryUpdateList($this->version);
        }
        return $this->_bulkCountryUpdates;
    }
    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return \Twilio\ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name)
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new TwilioException('Unknown subresource ' . $name);
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
        return '[Twilio.Voice.V1.DialingPermissionsList]';
    }
}