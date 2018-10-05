<?php

namespace BonnieDoug\StripeBundle\Model;

use BonnieDoug\StripeBundle\Annotation\StripeObjectParam;
use Symfony\Component\Serializer\Annotation\Groups;

abstract class AbstractCustomerModel extends StripeModel
{

    /**
     * String representing the object’s type. Objects of the same type share the same value.
     * @var string
     */
    protected $object = "customer";

    /**
     * Current balance, if any, being stored on the customer’s account. If negative, the customer has credit to apply to the next invoice. If positive, the customer has an amount owed that will be added to the next invoice. The balance does not refer to any unpaid invoices; it solely takes into account amounts that have yet to be successfully applied to any invoice. This balance is only taken into account for recurring billing purposes (i.e., subscriptions, invoices, invoice items).
     * @var string|null
     * @StripeObjectParam(name="account_balance")
     * @Groups({"post"})
     */
    protected $accountBalance = null;

    /**
     * Time at which the object was created. Measured in seconds since the Unix epoch.
     * @StripeObjectParam
     * @var integer|null
     */
    protected $created;

    /**
     * Three-letter ISO code for the currency the customer can be charged in for recurring billing purposes.
     * @StripeObjectParam
     * @var string|null
     */
    protected $currency = "GBP";

    /**
     * @StripeObjectParam(name="discount", embeddedId="coupon.id")
     * @var string|null
     * @Groups("post")
     */
    protected $coupon = null;

    /**
     * ID of the default source attached to this customer.
     * @StripeObjectParam(name="default_source")
     * @var null
     * @Groups("post")
     */
    protected $defaultSource = null;

    /**
     * When the customer’s latest invoice is billed by charging automatically, delinquent is true if the invoice’s latest charge is failed. When the customer’s latest invoice is billed by sending an invoice, delinquent is true if the invoice is not paid by its due date.
     * @StripeObjectParam
     * @var bool
     */
    protected $delinquent = false;

    /**
     * An arbitrary string attached to the object. Often useful for displaying to users.
     * @StripeObjectParam
     * @var string|null
     * @Groups("post")
     */
    protected $description = null;

    /**
     * Describes the current discount active on the customer, if there is one.
     * Hashed reference of a One-to-Many relation to \App\Entity\Discount
     * @StripeObjectParam
     * @var string|null
     */
    protected $discount = null;

    /**
     * The customer’s email address.
     * @StripeObjectParam
     * @var string|null
     * @Groups({"post", "put"})
     */
    protected $email = null;

    /**
     * The prefix for the customer used to generate unique invoice numbers.
     * @StripeObjectParam
     * @var string|null
     * @Groups("post")
     */
    protected $invoicePrefix = null;

    /**
     * Has the value true if the object exists in live mode or the value false if the object exists in test mode.
     * @StripeObjectParam
     * @var bool
     */
    protected $livemode = false;

    /**
     * Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
     * Hashed Object
     * @StripeObjectParam
     * @var array|null
     * @Groups("post")
     */
    protected $metadata = null;

    /**
     * Mailing and shipping address for the customer. Appears on invoices emailed to this customer.
     * Hashed Object
     * @StripeObjectParam
     * @var array|null
     * @Groups("post")
     */
    protected $shipping = null;

    /**
     * The customer’s payment source.
     * @StripeObjectParam
     * @var string|null
     * @Groups("post")
     */
    protected $source = null;

    /**
     * The customer’s payment sources, if any.
     * @StripeObjectParam
     * @var array|null
     */
    protected $sources = null;

    /**
     * The customer’s tax information. Appears on invoices emailed to this customer.
     * @StripeObjectParam
     * @var array|null
     * @Groups("post")
     */
    protected $taxInfo = null;

    /**
     * @StripeObjectParam
     * @var array|null
     */
    protected $taxInfoVerification = null;

    /**
     * @StripeObjectParam
     * @var bool|null
     */
    protected $deleted = false;

    /**
     * @return int
     */
    public function getAccountBalance()
    {
        return $this->accountBalance;
    }

    /**
     * @param int $accountBalance
     *
     * @return $this
     */
    public function setAccountBalance($accountBalance)
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param string $coupon
     *
     * @return $this
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param int $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultSource()
    {
        return $this->defaultSource;
    }

    /**
     * @param string $defaultSource
     *
     * @return $this
     */
    public function setDefaultSource($defaultSource)
    {
        $this->defaultSource = $defaultSource;

        return $this;
    }

    /**
     * @return string
     */
    public function getDelinquent()
    {
        return $this->delinquent;
    }

    /**
     * @param string $delinquent
     *
     * @return $this
     */
    public function setDelinquent($delinquent)
    {
        $this->delinquent = $delinquent;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode()
    {
        return $this->livemode;
    }

    /**
     * @param bool $livemode
     *
     * @return $this
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;

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
     * @return array
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param array $shipping
     *
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

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
     * @return AbstractCustomerModel
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param null|string $discount
     * @return AbstractCustomerModel
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getInvoicePrefix()
    {
        return $this->invoicePrefix;
    }

    /**
     * @param null|string $invoicePrefix
     * @return AbstractCustomerModel
     */
    public function setInvoicePrefix($invoicePrefix)
    {
        $this->invoicePrefix = $invoicePrefix;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param null|string $source
     * @return AbstractCustomerModel
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * @param array|null $sources
     * @return AbstractCustomerModel
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTaxInfo()
    {
        return $this->taxInfo;
    }

    /**
     * @param array|null $taxInfo
     * @return AbstractCustomerModel
     */
    public function setTaxInfo($taxInfo)
    {
        $this->taxInfo = $taxInfo;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTaxInfoVerification()
    {
        return $this->taxInfoVerification;
    }

    /**
     * @param array|null $taxInfoVerification
     * @return AbstractCustomerModel
     */
    public function setTaxInfoVerification($taxInfoVerification)
    {
        $this->taxInfoVerification = $taxInfoVerification;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool|null $deleted
     * @return AbstractCustomerModel
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return \Stripe\Customer
     */
    public function retrieveStripeObject()
    {
        return \Stripe\Customer::retrieve($this->getStripeId());
    }
}
