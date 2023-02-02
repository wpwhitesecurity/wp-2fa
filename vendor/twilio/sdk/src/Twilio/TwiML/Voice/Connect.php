<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\TwiML\Voice;

use WP2FA_Vendor\Twilio\TwiML\TwiML;
class Connect extends TwiML
{
    /**
     * Connect constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct('Connect', null, $attributes);
    }
    /**
     * Add Room child.
     *
     * @param string $name Room name
     * @param array $attributes Optional attributes
     * @return Room Child element.
     */
    public function room($name, $attributes = []) : Room
    {
        return $this->nest(new Room($name, $attributes));
    }
    /**
     * Add Autopilot child.
     *
     * @param string $name Autopilot assistant sid or unique name
     * @return Autopilot Child element.
     */
    public function autopilot($name) : Autopilot
    {
        return $this->nest(new Autopilot($name));
    }
    /**
     * Add Stream child.
     *
     * @param array $attributes Optional attributes
     * @return Stream Child element.
     */
    public function stream($attributes = []) : Stream
    {
        return $this->nest(new Stream($attributes));
    }
    /**
     * Add VirtualAgent child.
     *
     * @param array $attributes Optional attributes
     * @return VirtualAgent Child element.
     */
    public function virtualAgent($attributes = []) : VirtualAgent
    {
        return $this->nest(new VirtualAgent($attributes));
    }
    /**
     * Add Conversation child.
     *
     * @param array $attributes Optional attributes
     * @return Conversation Child element.
     */
    public function conversation($attributes = []) : Conversation
    {
        return $this->nest(new Conversation($attributes));
    }
    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     */
    public function setAction($action) : self
    {
        return $this->setAttribute('action', $action);
    }
    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     */
    public function setMethod($method) : self
    {
        return $this->setAttribute('method', $method);
    }
}