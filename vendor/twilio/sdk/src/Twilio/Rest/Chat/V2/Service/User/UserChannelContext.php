<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Chat\V2\Service\User;

use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Serialize;
use WP2FA_Vendor\Twilio\Values;
use WP2FA_Vendor\Twilio\Version;
class UserChannelContext extends InstanceContext
{
    /**
     * Initialize the UserChannelContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Service to fetch the User Channel
     *                           resource from
     * @param string $userSid The SID of the User to fetch the User Channel
     *                        resource from
     * @param string $channelSid The SID of the Channel that has the User Channel
     *                           to fetch
     */
    public function __construct(Version $version, $serviceSid, $userSid, $channelSid)
    {
        parent::__construct($version);
        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'userSid' => $userSid, 'channelSid' => $channelSid];
        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Users/' . \rawurlencode($userSid) . '/Channels/' . \rawurlencode($channelSid) . '';
    }
    /**
     * Fetch the UserChannelInstance
     *
     * @return UserChannelInstance Fetched UserChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() : UserChannelInstance
    {
        $payload = $this->version->fetch('GET', $this->uri);
        return new UserChannelInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['userSid'], $this->solution['channelSid']);
    }
    /**
     * Delete the UserChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []) : bool
    {
        $options = new Values($options);
        $headers = Values::of(['X-Twilio-Webhook-Enabled' => $options['xTwilioWebhookEnabled']]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }
    /**
     * Update the UserChannelInstance
     *
     * @param array|Options $options Optional Arguments
     * @return UserChannelInstance Updated UserChannelInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []) : UserChannelInstance
    {
        $options = new Values($options);
        $data = Values::of(['NotificationLevel' => $options['notificationLevel'], 'LastConsumedMessageIndex' => $options['lastConsumedMessageIndex'], 'LastConsumptionTimestamp' => Serialize::iso8601DateTime($options['lastConsumptionTimestamp'])]);
        $payload = $this->version->update('POST', $this->uri, [], $data);
        return new UserChannelInstance($this->version, $payload, $this->solution['serviceSid'], $this->solution['userSid'], $this->solution['channelSid']);
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
        return '[Twilio.Chat.V2.UserChannelContext ' . \implode(' ', $context) . ']';
    }
}
