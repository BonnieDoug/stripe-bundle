<?php

namespace BonnieDoug\StripeBundle\Model;

use BonnieDoug\StripeBundle\Annotation\StripeObjectParam;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Annotation
 */
abstract class AbstractCardModel extends StripeModel
{
    /**
     * String representing the object’s type. Objects of the same type share the same value.
     * @var string
     */
    protected $object;

    /**
     * The account this card belongs to. This attribute will not be in the card object if the card belongs to a customer or recipient instead.
     * @var string | null
     */
    protected $account;

    /**
     * City/District/Suburb/Town/Village.
     * @StripeObjectParam(name="address_city")
     * @var string | null
     */
    protected $addressCity;

    /**
     * Billing address country, if provided when creating card.
     * @StripeObjectParam(name="address_country")
     * @var string | null
     */
    protected $addressCountry;

    /**
     * Address line 1 (Street address/PO Box/Company name).
     * @StripeObjectParam(name="address_line1")
     * @var string | null
     */
    protected $addressLine1;

    /**
     * If address_line1 was provided, results of the check: pass, fail, unavailable, or unchecked.
     * @StripeObjectParam(name="address_line1_check")
     * @var string | null
     */
    protected $addressLine1Check;

    /**
     * Address line 2 (Apartment/Suite/Unit/Building).
     * @StripeObjectParam(name="address_line2")
     * @var string | null
     */
    protected $addressLine2;

    /**
     * State/County/Province/Region.
     * @StripeObjectParam(name="address_state")
     * @var string | null
     */
    protected $addressState;

    /**
     * ZIP or postal code.
     * @StripeObjectParam(name="address_zip")
     * @var string | null
     */
    protected $addressZip;

    /**
     * If address_zip was provided, results of the check: pass, fail, unavailable, or unchecked.
     * @StripeObjectParam(name="address_zip_check")
     * @var string | null
     */
    protected $addressZipCheck;

    /**
     * A set of available payout methods for this card. Will be either ["standard"] or ["standard", "instant"]. Only values from this set should be passed as the method when creating a transfer.
     * @var array | null
     */
    protected $avaliablePayoutMethods;

    /**
     * Card brand. Can be American Express, Diners Club, Discover, JCB, MasterCard, UnionPay, Visa, or Unknown.
     * @StripeObjectParam
     * @var string | null
     */
    protected $brand;

    /**
     * Two-letter ISO code representing the country of the card. You could use this attribute to get a sense of the international breakdown of cards you’ve collected.
     * @StripeObjectParam
     * @var string | null
     */
    protected $country;

    /**
     * Three-letter ISO code for currency. Only applicable on accounts (not customers or recipients). The card can be used as a transfer destination for funds in this currency.
     * @StripeObjectParam
     * @var string | null
     */
    protected $currency;

    /**
     * The customer that this card belongs to. This attribute will not be in the card object if the card belongs to an account or recipient instead.
     * @StripeObjectParam
     * @ORM\ManyToOne(targetEntity="AbstractCustomerModel", inversedBy="cards")
     * @ORM\JoinColumn(name="customer")
     *
     */
    protected $customer;

    /**
     * If a CVC was provided, results of the check: pass, fail, unavailable, or unchecked.
     * @StripeObjectParam(name="cvc_check")
     * @var string | null
     */
    protected $cvcCheck;

    /**
     * Only applicable on accounts (not customers or recipients). This indicates whether this card is the default external account for its currency.
     * @var string | null
     */
    protected $defaultForCurrency;

    /**
     * (For tokenized numbers only.) The last four digits of the device account number.
     * @StripeObjectParam(name="dynamic_last4")
     * @var string | null
     */
    protected $dynamicLast4;

    /**
     * Two-digit number representing the card’s expiration month.
     * @StripeObjectParam(name="exp_month")
     * @var integer | null
     */
    protected $expMonth;

    /**
     * Four-digit number representing the card’s expiration year.
     * @StripeObjectParam(name="exp_year")
     * @var integer | null
     */
    protected $expYear;

    /**
     * Uniquely identifies this particular card number. You can use this attribute to check whether two customers who’ve signed up with you are using the same card number, for example.
     * @StripeObjectParam
     * @var string | null
     */
    protected $fingerprint;

    /**
     * Card funding type. Can be credit, debit, prepaid, or unknown.
     * @StripeObjectParam
     * @var string | null
     */
    protected $funding;

    /**
     * The last four digits of the card.
     * @StripeObjectParam
     * @var string | null
     */
    protected $last4;

    /**
     * Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
     * @StripeObjectParam
     * @var string | null
     */
    protected $metadata;

    /**
     * Cardholder name.
     * @StripeObjectParam
     * @var string | null
     */
    protected $name;

    /**
     * The recipient that this card belongs to. This attribute will not be in the card object if the card belongs to a customer or account instead.
     * @var string | null
     */
    protected $recipient;

    /**
     * If the card number is tokenized, this is the method that was used. Can be apple_pay or android_pay.
     * @StripeObjectParam(name="tokenization_method")
     * @var string | null
     */
    protected $tokenizationMethod;

    /**
     * @return string
     */
    public function getAddressCity()
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     *
     * @return $this
     */
    public function setAddressCity($addressCity)
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->addressCountry;
    }

    /**
     * @param string $addressCountry
     *
     * @return $this
     */
    public function setAddressCountry($addressCountry)
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param string $addressLine1
     *
     * @return $this
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1Check()
    {
        return $this->addressLine1Check;
    }

    /**
     * @param string $addressLine1Check
     *
     * @return $this
     */
    public function setAddressLine1Check($addressLine1Check)
    {
        $this->addressLine1Check = $addressLine1Check;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param string $addressLine2
     *
     * @return $this
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressState()
    {
        return $this->addressState;
    }

    /**
     * @param string $addressState
     *
     * @return $this
     */
    public function setAddressState($addressState)
    {
        $this->addressState = $addressState;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressZip()
    {
        return $this->addressZip;
    }

    /**
     * @param string $addressZip
     *
     * @return $this
     */
    public function setAddressZip($addressZip)
    {
        $this->addressZip = $addressZip;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressZipCheck()
    {
        return $this->addressZipCheck;
    }

    /**
     * @param string $addressZipCheck
     *
     * @return $this
     */
    public function setAddressZipCheck($addressZipCheck)
    {
        $this->addressZipCheck = $addressZipCheck;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function getCvcCheck()
    {
        return $this->cvcCheck;
    }

    /**
     * @param string $cvcCheck
     *
     * @return $this
     */
    public function setCvcCheck($cvcCheck)
    {
        $this->cvcCheck = $cvcCheck;

        return $this;
    }

    /**
     * @return string
     */
    public function getDynamicLast4()
    {
        return $this->dynamicLast4;
    }

    /**
     * @param string $dynamicLast4
     *
     * @return $this
     */
    public function setDynamicLast4($dynamicLast4)
    {
        $this->dynamicLast4 = $dynamicLast4;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpMonth()
    {
        return $this->expMonth;
    }

    /**
     * @param int $expMonth
     *
     * @return $this
     */
    public function setExpMonth($expMonth)
    {
        $this->expMonth = $expMonth;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpYear()
    {
        return $this->expYear;
    }

    /**
     * @param int $expYear
     *
     * @return $this
     */
    public function setExpYear($expYear)
    {
        $this->expYear = $expYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param string $fingerprint
     *
     * @return $this
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @return string
     */
    public function getFunding()
    {
        return $this->funding;
    }

    /**
     * @param string $funding
     *
     * @return $this
     */
    public function setFunding($funding)
    {
        $this->funding = $funding;

        return $this;
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     * @param string $last4
     *
     * @return $this
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return string
     */
    public function getTokenizationMethod()
    {
        return $this->tokenizationMethod;
    }

    /**
     * @param string $tokenizationMethod
     *
     * @return $this
     */
    public function setTokenizationMethod($tokenizationMethod)
    {
        $this->tokenizationMethod = $tokenizationMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     * @return AbstractCardModel
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param null|string $account
     * @return AbstractCardModel
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getAvaliablePayoutMethods()
    {
        return $this->avaliablePayoutMethods;
    }

    /**
     * @param array|null $avaliablePayoutMethods
     * @return AbstractCardModel
     */
    public function setAvaliablePayoutMethods($avaliablePayoutMethods)
    {
        $this->avaliablePayoutMethods = $avaliablePayoutMethods;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param null|string $currency
     * @return AbstractCardModel
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDefaultForCurrency()
    {
        return $this->defaultForCurrency;
    }

    /**
     * @param null|string $defaultForCurrency
     * @return AbstractCardModel
     */
    public function setDefaultForCurrency($defaultForCurrency)
    {
        $this->defaultForCurrency = $defaultForCurrency;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param null|string $recipient
     * @return AbstractCardModel
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }
}
