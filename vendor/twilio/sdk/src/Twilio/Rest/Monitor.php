<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest;

use WP2FA_Vendor\Twilio\Domain;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\Rest\Monitor\V1;
/**
 * @property \Twilio\Rest\Monitor\V1 $v1
 * @property \Twilio\Rest\Monitor\V1\AlertList $alerts
 * @property \Twilio\Rest\Monitor\V1\EventList $events
 * @method \Twilio\Rest\Monitor\V1\AlertContext alerts(string $sid)
 * @method \Twilio\Rest\Monitor\V1\EventContext events(string $sid)
 */
class Monitor extends Domain
{
    protected $_v1;
    /**
     * Construct the Monitor Domain
     *
     * @param Client $client Client to communicate with Twilio
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->baseUrl = 'https://monitor.twilio.com';
    }
    /**
     * @return V1 Version v1 of monitor
     */
    protected function getV1() : V1
    {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }
    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get(string $name)
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->{$method}();
        }
        throw new TwilioException('Unknown version ' . $name);
    }
    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments)
    {
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array([$this, $method], $arguments);
        }
        throw new TwilioException('Unknown context ' . $name);
    }
    protected function getAlerts() : \WP2FA_Vendor\Twilio\Rest\Monitor\V1\AlertList
    {
        return $this->v1->alerts;
    }
    /**
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextAlerts(string $sid) : \WP2FA_Vendor\Twilio\Rest\Monitor\V1\AlertContext
    {
        return $this->v1->alerts($sid);
    }
    protected function getEvents() : \WP2FA_Vendor\Twilio\Rest\Monitor\V1\EventList
    {
        return $this->v1->events;
    }
    /**
     * @param string $sid The SID that identifies the resource to fetch
     */
    protected function contextEvents(string $sid) : \WP2FA_Vendor\Twilio\Rest\Monitor\V1\EventContext
    {
        return $this->v1->events($sid);
    }
    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() : string
    {
        return '[Twilio.Monitor]';
    }
}