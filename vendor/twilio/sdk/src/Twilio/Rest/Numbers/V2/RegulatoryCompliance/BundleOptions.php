<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */
namespace WP2FA_Vendor\Twilio\Rest\Numbers\V2\RegulatoryCompliance;

use WP2FA_Vendor\Twilio\Options;
use WP2FA_Vendor\Twilio\Values;
abstract class BundleOptions
{
    /**
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $endUserType The type of End User of the Bundle resource
     * @param string $numberType The type of phone number
     * @return CreateBundleOptions Options builder
     */
    public static function create(string $statusCallback = Values::NONE, string $regulationSid = Values::NONE, string $isoCountry = Values::NONE, string $endUserType = Values::NONE, string $numberType = Values::NONE) : CreateBundleOptions
    {
        return new CreateBundleOptions($statusCallback, $regulationSid, $isoCountry, $endUserType, $numberType);
    }
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $numberType The type of phone number
     * @param bool $hasValidUntilDate Indicates that the Bundle is a valid Bundle
     *                                until a specified expiration date.
     * @param string $sortBy Can be `valid-until` or `date-updated`. Defaults to
     *                       `date-created`.
     * @param string $sortDirection Default is `DESC`. Can be `ASC` or `DESC`.
     * @param string $validUntilDateBefore Date to filter Bundles having their
     *                                     `valid_until_date` before or after the
     *                                     specified date. Can be
     *                                     `ValidUntilDate>=` or
     *                                     `ValidUntilDate<=`. Both can be used in
     *                                     conjunction as well.
     * @param string $validUntilDate Date to filter Bundles having their
     *                               `valid_until_date` before or after the
     *                               specified date. Can be `ValidUntilDate>=` or
     *                               `ValidUntilDate<=`. Both can be used in
     *                               conjunction as well.
     * @param string $validUntilDateAfter Date to filter Bundles having their
     *                                    `valid_until_date` before or after the
     *                                    specified date. Can be `ValidUntilDate>=`
     *                                    or `ValidUntilDate<=`. Both can be used
     *                                    in conjunction as well.
     * @return ReadBundleOptions Options builder
     */
    public static function read(string $status = Values::NONE, string $friendlyName = Values::NONE, string $regulationSid = Values::NONE, string $isoCountry = Values::NONE, string $numberType = Values::NONE, bool $hasValidUntilDate = Values::NONE, string $sortBy = Values::NONE, string $sortDirection = Values::NONE, string $validUntilDateBefore = Values::NONE, string $validUntilDate = Values::NONE, string $validUntilDateAfter = Values::NONE) : ReadBundleOptions
    {
        return new ReadBundleOptions($status, $friendlyName, $regulationSid, $isoCountry, $numberType, $hasValidUntilDate, $sortBy, $sortDirection, $validUntilDateBefore, $validUntilDate, $validUntilDateAfter);
    }
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $email The email address
     * @return UpdateBundleOptions Options builder
     */
    public static function update(string $status = Values::NONE, string $statusCallback = Values::NONE, string $friendlyName = Values::NONE, string $email = Values::NONE) : UpdateBundleOptions
    {
        return new UpdateBundleOptions($status, $statusCallback, $friendlyName, $email);
    }
}
class CreateBundleOptions extends Options
{
    /**
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $endUserType The type of End User of the Bundle resource
     * @param string $numberType The type of phone number
     */
    public function __construct(string $statusCallback = Values::NONE, string $regulationSid = Values::NONE, string $isoCountry = Values::NONE, string $endUserType = Values::NONE, string $numberType = Values::NONE)
    {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['regulationSid'] = $regulationSid;
        $this->options['isoCountry'] = $isoCountry;
        $this->options['endUserType'] = $endUserType;
        $this->options['numberType'] = $numberType;
    }
    /**
     * The URL we call to inform your application of status changes.
     *
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @return $this Fluent Builder
     */
    public function setStatusCallback(string $statusCallback) : self
    {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }
    /**
     * The unique string of a regulation that is associated to the Bundle resource.
     *
     * @param string $regulationSid The unique string of a regulation.
     * @return $this Fluent Builder
     */
    public function setRegulationSid(string $regulationSid) : self
    {
        $this->options['regulationSid'] = $regulationSid;
        return $this;
    }
    /**
     * The [ISO country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the Bundle's phone number country ownership request.
     *
     * @param string $isoCountry The ISO country code of the country
     * @return $this Fluent Builder
     */
    public function setIsoCountry(string $isoCountry) : self
    {
        $this->options['isoCountry'] = $isoCountry;
        return $this;
    }
    /**
     * The [type of End User](https://www.twilio.com/docs/phone-numbers/regulatory/api/end-user-types) of the Bundle resource.
     *
     * @param string $endUserType The type of End User of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setEndUserType(string $endUserType) : self
    {
        $this->options['endUserType'] = $endUserType;
        return $this;
    }
    /**
     * The type of phone number of the Bundle's ownership request. Can be `local`, `mobile`, `national`, or `toll free`.
     *
     * @param string $numberType The type of phone number
     * @return $this Fluent Builder
     */
    public function setNumberType(string $numberType) : self
    {
        $this->options['numberType'] = $numberType;
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
        return '[Twilio.Numbers.V2.CreateBundleOptions ' . $options . ']';
    }
}
class ReadBundleOptions extends Options
{
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $regulationSid The unique string of a regulation.
     * @param string $isoCountry The ISO country code of the country
     * @param string $numberType The type of phone number
     * @param bool $hasValidUntilDate Indicates that the Bundle is a valid Bundle
     *                                until a specified expiration date.
     * @param string $sortBy Can be `valid-until` or `date-updated`. Defaults to
     *                       `date-created`.
     * @param string $sortDirection Default is `DESC`. Can be `ASC` or `DESC`.
     * @param string $validUntilDateBefore Date to filter Bundles having their
     *                                     `valid_until_date` before or after the
     *                                     specified date. Can be
     *                                     `ValidUntilDate>=` or
     *                                     `ValidUntilDate<=`. Both can be used in
     *                                     conjunction as well.
     * @param string $validUntilDate Date to filter Bundles having their
     *                               `valid_until_date` before or after the
     *                               specified date. Can be `ValidUntilDate>=` or
     *                               `ValidUntilDate<=`. Both can be used in
     *                               conjunction as well.
     * @param string $validUntilDateAfter Date to filter Bundles having their
     *                                    `valid_until_date` before or after the
     *                                    specified date. Can be `ValidUntilDate>=`
     *                                    or `ValidUntilDate<=`. Both can be used
     *                                    in conjunction as well.
     */
    public function __construct(string $status = Values::NONE, string $friendlyName = Values::NONE, string $regulationSid = Values::NONE, string $isoCountry = Values::NONE, string $numberType = Values::NONE, bool $hasValidUntilDate = Values::NONE, string $sortBy = Values::NONE, string $sortDirection = Values::NONE, string $validUntilDateBefore = Values::NONE, string $validUntilDate = Values::NONE, string $validUntilDateAfter = Values::NONE)
    {
        $this->options['status'] = $status;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['regulationSid'] = $regulationSid;
        $this->options['isoCountry'] = $isoCountry;
        $this->options['numberType'] = $numberType;
        $this->options['hasValidUntilDate'] = $hasValidUntilDate;
        $this->options['sortBy'] = $sortBy;
        $this->options['sortDirection'] = $sortDirection;
        $this->options['validUntilDateBefore'] = $validUntilDateBefore;
        $this->options['validUntilDate'] = $validUntilDate;
        $this->options['validUntilDateAfter'] = $validUntilDateAfter;
    }
    /**
     * The verification status of the Bundle resource. Please refer to [Bundle Statuses](https://www.twilio.com/docs/phone-numbers/regulatory/api/bundles#bundle-statuses) for more details.
     *
     * @param string $status The verification status of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setStatus(string $status) : self
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * The string that you assigned to describe the resource. The column can contain 255 variable characters.
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The unique string of a [Regulation resource](https://www.twilio.com/docs/phone-numbers/regulatory/api/regulations) that is associated to the Bundle resource.
     *
     * @param string $regulationSid The unique string of a regulation.
     * @return $this Fluent Builder
     */
    public function setRegulationSid(string $regulationSid) : self
    {
        $this->options['regulationSid'] = $regulationSid;
        return $this;
    }
    /**
     * The 2-digit [ISO country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the Bundle's phone number country ownership request.
     *
     * @param string $isoCountry The ISO country code of the country
     * @return $this Fluent Builder
     */
    public function setIsoCountry(string $isoCountry) : self
    {
        $this->options['isoCountry'] = $isoCountry;
        return $this;
    }
    /**
     * The type of phone number of the Bundle's ownership request. Can be `local`, `mobile`, `national`, or `tollfree`.
     *
     * @param string $numberType The type of phone number
     * @return $this Fluent Builder
     */
    public function setNumberType(string $numberType) : self
    {
        $this->options['numberType'] = $numberType;
        return $this;
    }
    /**
     * Indicates that the Bundle is a valid Bundle until a specified expiration date.
     *
     * @param bool $hasValidUntilDate Indicates that the Bundle is a valid Bundle
     *                                until a specified expiration date.
     * @return $this Fluent Builder
     */
    public function setHasValidUntilDate(bool $hasValidUntilDate) : self
    {
        $this->options['hasValidUntilDate'] = $hasValidUntilDate;
        return $this;
    }
    /**
     * Can be `valid-until` or `date-updated`. Defaults to `date-created`.
     *
     * @param string $sortBy Can be `valid-until` or `date-updated`. Defaults to
     *                       `date-created`.
     * @return $this Fluent Builder
     */
    public function setSortBy(string $sortBy) : self
    {
        $this->options['sortBy'] = $sortBy;
        return $this;
    }
    /**
     * Default is `DESC`. Can be `ASC` or `DESC`.
     *
     * @param string $sortDirection Default is `DESC`. Can be `ASC` or `DESC`.
     * @return $this Fluent Builder
     */
    public function setSortDirection(string $sortDirection) : self
    {
        $this->options['sortDirection'] = $sortDirection;
        return $this;
    }
    /**
     * Date to filter Bundles having their `valid_until_date` before or after the specified date. Can be `ValidUntilDate>=` or `ValidUntilDate<=`. Both can be used in conjunction as well. [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) is the acceptable date format.
     *
     * @param string $validUntilDateBefore Date to filter Bundles having their
     *                                     `valid_until_date` before or after the
     *                                     specified date. Can be
     *                                     `ValidUntilDate>=` or
     *                                     `ValidUntilDate<=`. Both can be used in
     *                                     conjunction as well.
     * @return $this Fluent Builder
     */
    public function setValidUntilDateBefore(string $validUntilDateBefore) : self
    {
        $this->options['validUntilDateBefore'] = $validUntilDateBefore;
        return $this;
    }
    /**
     * Date to filter Bundles having their `valid_until_date` before or after the specified date. Can be `ValidUntilDate>=` or `ValidUntilDate<=`. Both can be used in conjunction as well. [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) is the acceptable date format.
     *
     * @param string $validUntilDate Date to filter Bundles having their
     *                               `valid_until_date` before or after the
     *                               specified date. Can be `ValidUntilDate>=` or
     *                               `ValidUntilDate<=`. Both can be used in
     *                               conjunction as well.
     * @return $this Fluent Builder
     */
    public function setValidUntilDate(string $validUntilDate) : self
    {
        $this->options['validUntilDate'] = $validUntilDate;
        return $this;
    }
    /**
     * Date to filter Bundles having their `valid_until_date` before or after the specified date. Can be `ValidUntilDate>=` or `ValidUntilDate<=`. Both can be used in conjunction as well. [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) is the acceptable date format.
     *
     * @param string $validUntilDateAfter Date to filter Bundles having their
     *                                    `valid_until_date` before or after the
     *                                    specified date. Can be `ValidUntilDate>=`
     *                                    or `ValidUntilDate<=`. Both can be used
     *                                    in conjunction as well.
     * @return $this Fluent Builder
     */
    public function setValidUntilDateAfter(string $validUntilDateAfter) : self
    {
        $this->options['validUntilDateAfter'] = $validUntilDateAfter;
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
        return '[Twilio.Numbers.V2.ReadBundleOptions ' . $options . ']';
    }
}
class UpdateBundleOptions extends Options
{
    /**
     * @param string $status The verification status of the Bundle resource
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @param string $email The email address
     */
    public function __construct(string $status = Values::NONE, string $statusCallback = Values::NONE, string $friendlyName = Values::NONE, string $email = Values::NONE)
    {
        $this->options['status'] = $status;
        $this->options['statusCallback'] = $statusCallback;
        $this->options['friendlyName'] = $friendlyName;
        $this->options['email'] = $email;
    }
    /**
     * The verification status of the Bundle resource.
     *
     * @param string $status The verification status of the Bundle resource
     * @return $this Fluent Builder
     */
    public function setStatus(string $status) : self
    {
        $this->options['status'] = $status;
        return $this;
    }
    /**
     * The URL we call to inform your application of status changes.
     *
     * @param string $statusCallback The URL we call to inform your application of
     *                               status changes.
     * @return $this Fluent Builder
     */
    public function setStatusCallback(string $statusCallback) : self
    {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }
    /**
     * The string that you assigned to describe the resource.
     *
     * @param string $friendlyName The string that you assigned to describe the
     *                             resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName) : self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }
    /**
     * The email address that will receive updates when the Bundle resource changes status.
     *
     * @param string $email The email address
     * @return $this Fluent Builder
     */
    public function setEmail(string $email) : self
    {
        $this->options['email'] = $email;
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
        return '[Twilio.Numbers.V2.UpdateBundleOptions ' . $options . ']';
    }
}
