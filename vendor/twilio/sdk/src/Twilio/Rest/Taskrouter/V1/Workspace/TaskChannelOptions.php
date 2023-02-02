<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Taskrouter\V1\Workspace;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
abstract class TaskChannelOptions
{
    /**
     * @param string $friendlyName A string to describe the Task Channel resource
     * @param bool $channelOptimizedRouting Whether the TaskChannel should
     *                                      prioritize Workers that have been idle
     * @return UpdateTaskChannelOptions Options builder
     */
    public static function update(string $friendlyName = Values::NONE, bool $channelOptimizedRouting = Values::NONE) : UpdateTaskChannelOptions
    {
        return new UpdateTaskChannelOptions($friendlyName, $channelOptimizedRouting);
    }
    /**
     * @param bool $channelOptimizedRouting Whether the Task Channel should
     *                                      prioritize Workers that have been idle
     * @return CreateTaskChannelOptions Options builder
     */
    public static function create(bool $channelOptimizedRouting = Values::NONE) : CreateTaskChannelOptions
    {
        return new CreateTaskChannelOptions($channelOptimizedRouting);
    }
}
class UpdateTaskChannelOptions extends Options
{
    /**
     * @param string $friendlyName A string to describe the Task Channel resource
     * @param bool $channelOptimizedRouting Whether the TaskChannel should
     *                                      prioritize Workers that have been idle
     */
    public function __construct(string $friendlyName = Values::NONE, bool $channelOptimizedRouting = Values::NONE)
    {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['channelOptimizedRouting'] = $channelOptimizedRouting;
    }
    /**
     * A descriptive string that you create to describe the Task Channel. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the Task Channel resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * Whether the TaskChannel should prioritize Workers that have been idle. If `true`, Workers that have been idle the longest are prioritized.
     *
     * @param bool $channelOptimizedRouting Whether the TaskChannel should
     *                                      prioritize Workers that have been idle
     * @return $this Fluent Builder
     */
    public function setChannelOptimizedRouting(bool $channelOptimizedRouting) : self
    {
        $this->options['channelOptimizedRouting'] = $channelOptimizedRouting;
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
        return '[Twilio.Taskrouter.V1.UpdateTaskChannelOptions ' . $options . ']';
    }
}
class CreateTaskChannelOptions extends Options
{
    /**
     * @param bool $channelOptimizedRouting Whether the Task Channel should
     *                                      prioritize Workers that have been idle
     */
    public function __construct(bool $channelOptimizedRouting = Values::NONE)
    {
        $this->options['channelOptimizedRouting'] = $channelOptimizedRouting;
    }
    /**
     * Whether the Task Channel should prioritize Workers that have been idle. If `true`, Workers that have been idle the longest are prioritized.
     *
     * @param bool $channelOptimizedRouting Whether the Task Channel should
     *                                      prioritize Workers that have been idle
     * @return $this Fluent Builder
     */
    public function setChannelOptimizedRouting(bool $channelOptimizedRouting) : self
    {
        $this->options['channelOptimizedRouting'] = $channelOptimizedRouting;
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
        return '[Twilio.Taskrouter.V1.CreateTaskChannelOptions ' . $options . ']';
    }
}
