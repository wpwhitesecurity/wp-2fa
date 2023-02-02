<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Preview\Sync\Service\SyncList;

use WP2FA_Vendor\Twilio\Deserialize;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceResource;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property int $index
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $listSid
 * @property string $url
 * @property string $revision
 * @property array $data
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $createdBy
 */
class SyncListItemInstance extends InstanceResource
{
    /**
     * Initialize the SyncListItemInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The service_sid
     * @param string $listSid The list_sid
     * @param int $index The index
     */
    public function __construct(Version $version, array $payload, string $serviceSid, string $listSid, int $index = null)
    {
        parent::__construct($version);
        // Marshaled Properties
        $this->properties = ['index' => Values::array_get($payload, 'index'), 'accountSid' => Values::array_get($payload, 'account_sid'), 'serviceSid' => Values::array_get($payload, 'service_sid'), 'listSid' => Values::array_get($payload, 'list_sid'), 'url' => Values::array_get($payload, 'url'), 'revision' => Values::array_get($payload, 'revision'), 'data' => Values::array_get($payload, 'data'), 'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')), 'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')), 'createdBy' => Values::array_get($payload, 'created_by')];
        $this->solution = ['serviceSid' => $serviceSid, 'listSid' => $listSid, 'index' => $index ?: $this->properties['index']];
    }
    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return SyncListItemContext Context for this SyncListItemInstance
     */
    protected function proxy() : SyncListItemContext
    {
        if (!$this->context) {
            $this->context = new SyncListItemContext($this->version, $this->solution['serviceSid'], $this->solution['listSid'], $this->solution['index']);
        }
        return $this->context;
    }
    /**
     * Fetch the SyncListItemInstance
     *
     * @return SyncListItemInstance Fetched SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : SyncListItemInstance
    {
        return $this->proxy()->fetch();
    }
    /**
     * Delete the SyncListItemInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        return $this->proxy()->delete($options);
    }
    /**
     * Update the SyncListItemInstance
     *
     * @param array $data The data
     * @param array|Options $options Optional Arguments
     * @return SyncListItemInstance Updated SyncListItemInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $data, array $options = []) : SyncListItemInstance
    {
        return $this->proxy()->update($data, $options);
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
        return '[Twilio.Preview.Sync.SyncListItemInstance ' . \implode(' ', $context) . ']';
    }
}
