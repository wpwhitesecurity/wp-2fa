<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Bulkexports\V1;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property bool $enabled
 * @property string $webhookUrl
 * @property string $webhookMethod
 * @property string $resourceType
 * @property string $url
 */
class ExportConfigurationInstance extends InstanceResource
{
    /**
     * Initialize the ExportConfigurationInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $resourceType The type of communication – Messages, Calls,
     *                             Conferences, and Participants
     */
    public function __construct(Version $version, array $payload, string $resourceType = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['enabled' => Values::array_get($payload, 'enabled'), 'webhookUrl' => Values::array_get($payload, 'webhook_url'), 'webhookMethod' => Values::array_get($payload, 'webhook_method'), 'resourceType' => Values::array_get($payload, 'resource_type'), 'url' => Values::array_get($payload, 'url')];
        $this->solution = ['resourceType' => $resourceType ?: $this->properties['resourceType']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ExportConfigurationContext Context for this
     *                                    ExportConfigurationInstance
     */
    protected function proxy() : ExportConfigurationContext
    {
        if (!$this->context) {
            $this->context = new ExportConfigurationContext($this->version, $this->solution['resourceType']);
        }
        return $this->context;
    }
    /**
     * Fetch the ExportConfigurationInstance
     *
     * @return ExportConfigurationInstance Fetched ExportConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : ExportConfigurationInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Update the ExportConfigurationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ExportConfigurationInstance Updated ExportConfigurationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : ExportConfigurationInstance
    {
        return $this->proxy()->update($options);
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
        return '[Twilio.Bulkexports.V1.ExportConfigurationInstance ' . \implode(' ', $context) . ']';
    }
}
