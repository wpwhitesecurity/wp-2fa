<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Voice;

use WP2FA_Vendor\Twilio\Domain;
use WP2FA_Vendor\Twilio\Exceptions\TwilioException;
use WP2FA_Vendor\Twilio\InstanceContext;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\ArchivedCallList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\ByocTrunkList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\ConnectionPolicyList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\DialingPermissionsList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\IpRecordList;
use WP2FA_Vendor\Twilio\Rest\Voice\V1\SourceIpMappingList;
use WP2FA_Vendor\Twilio\Version;
/**
 * @property ArchivedCallList $archivedCalls
 * @property ByocTrunkList $byocTrunks
 * @property ConnectionPolicyList $connectionPolicies
 * @property DialingPermissionsList $dialingPermissions
 * @property IpRecordList $ipRecords
 * @property SourceIpMappingList $sourceIpMappings
 * @method \Twilio\Rest\Voice\V1\ArchivedCallContext archivedCalls(\DateTime $date, string $sid)
 * @method \Twilio\Rest\Voice\V1\ByocTrunkContext byocTrunks(string $sid)
 * @method \Twilio\Rest\Voice\V1\ConnectionPolicyContext connectionPolicies(string $sid)
 * @method \Twilio\Rest\Voice\V1\IpRecordContext ipRecords(string $sid)
 * @method \Twilio\Rest\Voice\V1\SourceIpMappingContext sourceIpMappings(string $sid)
 */
class V1 extends Version
{
    protected $_archivedCalls;
    protected $_byocTrunks;
    protected $_connectionPolicies;
    protected $_dialingPermissions;
    protected $_ipRecords;
    protected $_sourceIpMappings;
    /**
     * Construct the V1 version of Voice
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain)
    {
        parent::__construct($domain);
        $this->version = 'v1';
    }
    protected function getArchivedCalls() : ArchivedCallList
    {
        if (!$this->_archivedCalls) {
            $this->_archivedCalls = new ArchivedCallList($this);
        }
        return $this->_archivedCalls;
    }
    protected function getByocTrunks() : ByocTrunkList
    {
        if (!$this->_byocTrunks) {
            $this->_byocTrunks = new ByocTrunkList($this);
        }
        return $this->_byocTrunks;
    }
    protected function getConnectionPolicies() : ConnectionPolicyList
    {
        if (!$this->_connectionPolicies) {
            $this->_connectionPolicies = new ConnectionPolicyList($this);
        }
        return $this->_connectionPolicies;
    }
    protected function getDialingPermissions() : DialingPermissionsList
    {
        if (!$this->_dialingPermissions) {
            $this->_dialingPermissions = new DialingPermissionsList($this);
        }
        return $this->_dialingPermissions;
    }
    protected function getIpRecords() : IpRecordList
    {
        if (!$this->_ipRecords) {
            $this->_ipRecords = new IpRecordList($this);
        }
        return $this->_ipRecords;
    }
    protected function getSourceIpMappings() : SourceIpMappingList
    {
        if (!$this->_sourceIpMappings) {
            $this->_sourceIpMappings = new SourceIpMappingList($this);
        }
        return $this->_sourceIpMappings;
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
        return '[Twilio.Voice.V1]';
    }
}
