<?php

namespace BonnieDoug\StripeBundle\Model;

use BonnieDoug\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractChargeModel extends StripeModel
{

    /**
     * String representing the object’s type. Objects of the same type share the same value.
     * @var string | null
     */
    protected $object = "charge";

    /**
     * A positive integer in the smallest currency unit (e.g., 100 cents to charge $1.00 or 100 to charge ¥100, a zero-decimal currency) representing how much to charge. The minimum amount is $0.50 US or equivalent in charge currency.
     * @var int
     * @Groups({"post"})
     * @StripeObjectParam
     * @Assert\NotBlank(groups={"post"})
     */
    protected $amount = 0;

    /**
     * Amount in cents refunded (can be less than the amount attribute on the charge if a partial refund was issued).
     * @StripeObjectParam(name="amount_refunded")
     * @var string | null
     */
    protected $amountRefunded;

    /**
     * ID of the Connect application that created the charge.
     * @var string | null
     */
    protected $application;

    /**
     * The application fee (if any) for the charge. See the Connect documentation for details.
     * @var string | null
     */
    protected $applicationFee;

    /**
     * ID of the balance transaction that describes the impact of this charge on your account balance (not including refunds or disputes).
     * @StripeObjectParam(name="balance_transaction")
     * @var  string | null
     */
    protected $balanceTransaction;

    /**
     * If the charge was created without capturing, this Boolean represents whether it is still uncaptured or has since been captured.
     * @StripeObjectParam
     * @var boolean
     */
    protected $captured = false;

    /**
     * Time at which the object was created. Measured in seconds since the Unix epoch.
     * @StripeObjectParam
     * @var integer
     */
    protected $created;

    /**
     * Three-letter ISO currency code, in lowercase. Must be a supported currency.
     * @StripeObjectParam
     * @var  string | null
     */
    protected $currency = "GBP";

    /**
     * ID of the customer this charge is for if one exists.
     * @StripeObjectParam
     * @var string | null
     */
    protected $customer;

    /**
     * An arbitrary string attached to the object. Often useful for displaying to users.
     * @StripeObjectParam
     * @var string | null
     */
    protected $description;

    /**
     * The account (if any) the charge was made on behalf of, with an automatic transfer. See the Connect documentation for details.
     * @StripeObjectParam
     * @var string | null
     */
    protected $destination;

    /**
     * Details about the dispute if the charge has been disputed.
     * @StripeObjectParam
     * @var string | null
     */
    protected $dispute;

    /**
     * Error code explaining reason for charge failure if available (see the errors section for a list of codes).
     * @StripeObjectParam(name="failure_code")
     * @var string | null
     */
    protected $failureCode;

    /**
     * Message to user further explaining reason for charge failure if available.
     * @StripeObjectParam(name="failure_message")
     * @var string | null
     */
    protected $failureMessage;

    /**
     * Hash with information on fraud assessments for the charge. Assessments reported by you have the key user_report and, if set, possible values of safe and fraudulent. Assessments from Stripe have the key stripe_report and, if set, the value fraudulent.
     * @StripeObjectParam(name="fraud_details")
     * @var array | null
     */
    protected $fraudDetails;

    /**
     * ID of the invoice this charge is for if one exists.
     * @StripeObjectParam
     * @var string | null
     */
    protected $invoice;

    /**
     * Has the value true if the object exists in live mode or the value false if the object exists in test mode.
     * @StripeObjectParam
     * @var boolean
     */
    protected $livemode = true;

    /**
     * Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
     * @StripeObjectParam
     * @var array | null
     */
    protected $metadata;

    /**
     * The account (if any) the charge was made on behalf of without triggering an automatic transfer. See the Connect documentation for details.
     * @StripeObjectParam(name="on_behlaf_of")
     * @var string | null
     */
    protected $onBehalfOf;

    /**
     * ID of the order this charge is for if one exists.
     * @StripeObjectParam
     * @var string | null
     */
    protected $order;

    /**
     * Details about whether the payment was accepted, and why. See understanding declines for details.
     * @StripeObjectParam
     * @var array | null
     */
    protected $outcome;

    /**
     * true if the charge succeeded, or was successfully authorized for later capture.
     * @StripeObjectParam
     * @var boolean
     */
    protected $paid = false;

    /**
     * ID of the PaymentIntent associated with this charge, if one exists.
     * @StripeObjectParam(name="payment_intent")
     * @var string | null
     */
    protected $paymentIntent;

    /**
     * This is the email address that the receipt for this charge was sent to.
     * @StripeObjectParam(name="receipt_email")
     * @var string | null
     */
    protected $receiptEmail;

    /**
     * This is the transaction number that appears on email receipts sent for this charge. This attribute will be null until a receipt has been sent.
     * @StripeObjectParam(name="receipt_number")
     * @var string | null
     */
    protected $receiptNumber;

    /**
     * Whether the charge has been fully refunded. If the charge is only partially refunded, this attribute will still be false.
     * @StripeObjectParam
     * @var boolean
     */
    protected $refunded = false;

    /**
     * A list of refunds that have been applied to the charge.
     * @StripeObjectParam
     * @var array | null
     */
    protected $refunds;

    /**
     * ID of the review associated with this charge if one exists.
     * @StripeObjectParam
     * @var string | null
     */
    protected $review;

    /**
     * Shipping information for the charge.
     * @StripeObjectParam
     * @var array | null
     */
    protected $shipping;

    /**
     * For most Stripe users, the source of every charge is a credit or debit card. This hash is then the card object describing that card.
     * @StripeObjectParam(embeddedId="id")
     * @var array | null
     */
    protected $source;

    /**
     * The transfer ID which created this charge. Only present if the charge came from another Stripe account. See the Connect documentation for details.
     * @StripeObjectParam(name="source_transfer")
     * @var string | null
     */
    protected $sourceTransfer;

    /**
     * Extra information about a charge. This will appear on your customer’s credit card statement. It must contain at least one letter.
     * @StripeObjectParam(name="statement_descriptor")
     * @var string | null
     */
    protected $statementDescriptor;

    /**
     * The status of the payment is either succeeded, pending, or failed.
     * @StripeObjectParam
     * @var string | null
     */
    protected $status;

    /**
     * ID of the transfer to the destination account (only applicable if the charge was created using the destination parameter).
     * @StripeObjectParam
     * @var string | null
     */
    protected $transfer;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmountRefunded()
    {
        return $this->amountRefunded;
    }

    /**
     * @param int $amountRefunded
     *
     * @return $this
     */
    public function setAmountRefunded($amountRefunded)
    {
        $this->amountRefunded = $amountRefunded;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalanceTransaction()
    {
        return $this->balanceTransaction;
    }

    /**
     * @param string $balanceTransaction
     *
     * @return $this
     */
    public function setBalanceTransaction($balanceTransaction)
    {
        $this->balanceTransaction = $balanceTransaction;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCaptured()
    {
        return $this->captured;
    }

    /**
     * @param bool $captured
     *
     * @return $this
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;

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
    public function getDispute()
    {
        return $this->dispute;
    }

    /**
     * @param string $dispute
     *
     * @return $this
     */
    public function setDispute($dispute)
    {
        $this->dispute = $dispute;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * @param string $failureCode
     *
     * @return $this
     */
    public function setFailureCode($failureCode)
    {
        $this->failureCode = $failureCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureMessage()
    {
        return $this->failureMessage;
    }

    /**
     * @param string $failureMessage
     *
     * @return $this
     */
    public function setFailureMessage($failureMessage)
    {
        $this->failureMessage = $failureMessage;

        return $this;
    }

    /**
     * @return array
     */
    public function getFraudDetails()
    {
        return $this->fraudDetails;
    }

    /**
     * @param array $fraudDetails
     *
     * @return $this
     */
    public function setFraudDetails($fraudDetails)
    {
        $this->fraudDetails = $fraudDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param string $invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

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
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param array $outcome
     *
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptEmail()
    {
        return $this->receiptEmail;
    }

    /**
     * @param string $receiptEmail
     *
     * @return $this
     */
    public function setReceiptEmail($receiptEmail)
    {
        $this->receiptEmail = $receiptEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * @param string $receiptNumber
     *
     * @return $this
     */
    public function setReceiptNumber($receiptNumber)
    {
        $this->receiptNumber = $receiptNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param bool $refunded
     *
     * @return $this
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

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
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     *
     * @return $this
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param null|string $object
     * @return AbstractChargeModel
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param null|string $application
     * @return AbstractChargeModel
     */
    public function setApplication($application)
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getApplicationFee()
    {
        return $this->applicationFee;
    }

    /**
     * @param null|string $applicationFee
     * @return AbstractChargeModel
     */
    public function setApplicationFee($applicationFee)
    {
        $this->applicationFee = $applicationFee;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param null|string $destination
     * @return AbstractChargeModel
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOnBehalfOf()
    {
        return $this->onBehalfOf;
    }

    /**
     * @param null|string $onBehalfOf
     * @return AbstractChargeModel
     */
    public function setOnBehalfOf($onBehalfOf)
    {
        $this->onBehalfOf = $onBehalfOf;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPaymentIntent()
    {
        return $this->paymentIntent;
    }

    /**
     * @param null|string $paymentIntent
     * @return AbstractChargeModel
     */
    public function setPaymentIntent($paymentIntent)
    {
        $this->paymentIntent = $paymentIntent;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @param array|null $refunds
     * @return AbstractChargeModel
     */
    public function setRefunds($refunds)
    {
        $this->refunds = $refunds;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param null|string $review
     * @return AbstractChargeModel
     */
    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSourceTransfer()
    {
        return $this->sourceTransfer;
    }

    /**
     * @param null|string $sourceTransfer
     * @return AbstractChargeModel
     */
    public function setSourceTransfer($sourceTransfer)
    {
        $this->sourceTransfer = $sourceTransfer;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTransfer()
    {
        return $this->transfer;
    }

    /**
     * @param null|string $transfer
     * @return AbstractChargeModel
     */
    public function setTransfer($transfer)
    {
        $this->transfer = $transfer;
        return $this;
    }

}
