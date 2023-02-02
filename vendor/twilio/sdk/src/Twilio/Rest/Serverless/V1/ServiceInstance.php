<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Serverless\V1;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Rest\Serverless\V1\Service\AssetList;
use WP2FA_Vendor\Twilio\Rest\Serverless\V1\Service\BuildList;
use WP2FA_Vendor\Twilio\Rest\Serverless\V1\Service\EnvironmentList;
use WP2FA_Vendor\Twilio\Rest\Serverless\V1\Service\FunctionList;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $friendlyName
 * @property string $uniqueName
 * @property bool $includeCredentials
 * @property bool $uiEditable
 * @property string $domainBase
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class ServiceInstance extends InstanceResource
{
    protected $_environments;
    protected $_functions;
    protected $_assets;
    protected $_builds;
    /**
     * Initialize the ServiceInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The SID of the Service resource to fetch
     */
    public function __construct(Version $version, array $payload, string $sid = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['sid' => Values::array_get($payload, 'sid'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'friendlyName' => Values::array_get($payload, 'friendly_name'), 'uniqueName' => Values::array_get($payload, 'unique_name'), 'includeCredentials' => Values::array_get($payload, 'include_credentials'), 'uiEditable' => Values::array_get($payload, 'ui_editable'), 'domainBase' => Values::array_get($payload, 'domain_base'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'url' => Values::array_get($payload, 'url'), 'links' => Values::array_get($payload, 'links')];
        $this->solution = ['sid' => $sid ?: $this->properties['sid']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ServiceContext Context for this ServiceInstance
     */
    protected function proxy() : ServiceContext
    {
        if (!$this->context) {
            $this->context = new ServiceContext($this->version, $this->solution['sid']);
        }
        return $this->context;
    }
    /**
     * Fetch the ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : ServiceInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Delete the ServiceInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() : bool
    {
        return $this->proxy()->delete();
    }
    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : ServiceInstance
    {
        return $this->proxy()->update($options);
    }
    /**
     * Access the environments
     */
    protected function getEnvironments() : EnvironmentList
    {
        return $this->proxy()->environments;
    }
    /**
     * Access the functions
     */
    protected function getFunctions() : FunctionList
    {
        return $this->proxy()->functions;
    }
    /**
     * Access the assets
     */
    protected function getAssets() : AssetList
    {
        return $this->proxy()->assets;
    }
    /**
     * Access the builds
     */
    protected function getBuilds() : BuildList
    {
        return $this->proxy()->builds;
    }
    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->{$method}();
        }
        throw new TwilioException('Unknown property: ' . $name);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "{$key}={$value}";
        }
        return '[Twilio.Serverless.V1.ServiceInstance ' . \implode(' ', $context) . ']';
    }
}