<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ap
 *
 * @ORM\Table(name="accetic_ap", indexes={@ORM\Index(name="IDX_unit_id", columns={"unit_id"})})
 * @ORM\MappedSuperClass
 * @ORM\HasLifecycleCallbacks
 */
class Ap implements \Morus\AcceticBundle\Model\ApInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="invnumber", type="text", nullable=true)
     */
    private $invnumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="transdate", type="date", nullable=true)
     */
    private $transdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="taxincluded", type="boolean", nullable=true)
     */
    private $taxincluded;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="netamount", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $netamount;

    /**
     * @var string
     *
     * @ORM\Column(name="paid", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $paid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepaid", type="date", nullable=true)
     */
    private $datepaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duedate", type="date", nullable=true)
     */
    private $duedate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="invoice", type="boolean", nullable=true)
     */
    private $invoice;

    /**
     * @var string
     *
     * @ORM\Column(name="ordnumber", type="text", nullable=true)
     */
    private $ordnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="curr", type="string", nullable=true)
     */
    private $curr;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="till", type="string", length=20, nullable=true)
     */
    private $till;

    /**
     * @var string
     *
     * @ORM\Column(name="quonumber", type="text", nullable=true)
     */
    private $quonumber;

    /**
     * @var string
     *
     * @ORM\Column(name="intnotes", type="text", nullable=true)
     */
    private $intnotes;

    /**
     * @var string
     *
     * @ORM\Column(name="shipvia", type="text", nullable=true)
     */
    private $shipvia;

    /**
     * @var string
     *
     * @ORM\Column(name="language_code", type="string", length=6, nullable=true)
     */
    private $languageCode;

    /**
     * @var string
     *
     * @ORM\Column(name="ponumber", type="text", nullable=true)
     */
    private $ponumber;

    /**
     * @var string
     *
     * @ORM\Column(name="shippingpoint", type="text", nullable=true)
     */
    private $shippingpoint;

    /**
     * @var boolean
     *
     * @ORM\Column(name="on_hold", type="boolean", nullable=true)
     */
    private $onHold;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true)
     */
    private $approved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reverse", type="boolean", nullable=true)
     */
    private $reverse;

    /**
     * @var integer
     *
     * @ORM\Column(name="terms", type="smallint", nullable=true)
     */
    private $terms;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="force_closed", type="boolean", nullable=true)
     */
    private $forceClosed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crdate", type="date", nullable=true)
     */
    private $crdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_return", type="boolean", nullable=true)
     */
    private $isReturn;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified_date", type="datetime", nullable=true)
     */
    private $lastModifiedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inactive_date", type="datetime", nullable=true)
     */
    private $inactiveDate;
    
    /**
     * @var \Morus\AcceticBundle\Model\TransactionInterface
     *
     * @ORM\OneToOne(targetEntity="Morus\AcceticBundle\Model\TransactionInterface", inversedBy="ap", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transaction_id", referencedColumnName="id", unique=true)
     * })
     */
    protected $transaction;

    /**
     * @var \Morus\AcceticBundle\Model\UnitInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\UnitInterface", inversedBy="aps", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     * })
     */
    protected $unit;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createDate = new \DateTime("now");
        $this->active = true;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist()
    {
        // Add your code here
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set invnumber
     *
     * @param string $invnumber
     * @return Ap
     */
    public function setInvnumber($invnumber)
    {
        $this->invnumber = $invnumber;

        return $this;
    }

    /**
     * Get invnumber
     *
     * @return string 
     */
    public function getInvnumber()
    {
        return $this->invnumber;
    }

    /**
     * Set transdate
     *
     * @param \DateTime $transdate
     * @return Ap
     */
    public function setTransdate($transdate)
    {
        $this->transdate = $transdate;

        return $this;
    }

    /**
     * Get transdate
     *
     * @return \DateTime 
     */
    public function getTransdate()
    {
        return $this->transdate;
    }

    /**
     * Set taxincluded
     *
     * @param boolean $taxincluded
     * @return Ap
     */
    public function setTaxincluded($taxincluded)
    {
        $this->taxincluded = $taxincluded;

        return $this;
    }

    /**
     * Get taxincluded
     *
     * @return boolean 
     */
    public function getTaxincluded()
    {
        return $this->taxincluded;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Ap
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set netamount
     *
     * @param string $netamount
     * @return Ap
     */
    public function setNetamount($netamount)
    {
        $this->netamount = $netamount;

        return $this;
    }

    /**
     * Get netamount
     *
     * @return string 
     */
    public function getNetamount()
    {
        return $this->netamount;
    }

    /**
     * Set paid
     *
     * @param string $paid
     * @return Ap
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get paid
     *
     * @return string 
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set datepaid
     *
     * @param \DateTime $datepaid
     * @return Ap
     */
    public function setDatepaid($datepaid)
    {
        $this->datepaid = $datepaid;

        return $this;
    }

    /**
     * Get datepaid
     *
     * @return \DateTime 
     */
    public function getDatepaid()
    {
        return $this->datepaid;
    }

    /**
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return Ap
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;

        return $this;
    }

    /**
     * Get duedate
     *
     * @return \DateTime 
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * Set invoice
     *
     * @param boolean $invoice
     * @return Ap
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return boolean 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Set ordnumber
     *
     * @param string $ordnumber
     * @return Ap
     */
    public function setOrdnumber($ordnumber)
    {
        $this->ordnumber = $ordnumber;

        return $this;
    }

    /**
     * Get ordnumber
     *
     * @return string 
     */
    public function getOrdnumber()
    {
        return $this->ordnumber;
    }

    /**
     * Set curr
     *
     * @param string $curr
     * @return Ap
     */
    public function setCurr($curr)
    {
        $this->curr = $curr;

        return $this;
    }

    /**
     * Get curr
     *
     * @return string 
     */
    public function getCurr()
    {
        return $this->curr;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Ap
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set till
     *
     * @param string $till
     * @return Ap
     */
    public function setTill($till)
    {
        $this->till = $till;

        return $this;
    }

    /**
     * Get till
     *
     * @return string 
     */
    public function getTill()
    {
        return $this->till;
    }

    /**
     * Set quonumber
     *
     * @param string $quonumber
     * @return Ap
     */
    public function setQuonumber($quonumber)
    {
        $this->quonumber = $quonumber;

        return $this;
    }

    /**
     * Get quonumber
     *
     * @return string 
     */
    public function getQuonumber()
    {
        return $this->quonumber;
    }

    /**
     * Set intnotes
     *
     * @param string $intnotes
     * @return Ap
     */
    public function setIntnotes($intnotes)
    {
        $this->intnotes = $intnotes;

        return $this;
    }

    /**
     * Get intnotes
     *
     * @return string 
     */
    public function getIntnotes()
    {
        return $this->intnotes;
    }

    /**
     * Set shipvia
     *
     * @param string $shipvia
     * @return Ap
     */
    public function setShipvia($shipvia)
    {
        $this->shipvia = $shipvia;

        return $this;
    }

    /**
     * Get shipvia
     *
     * @return string 
     */
    public function getShipvia()
    {
        return $this->shipvia;
    }

    /**
     * Set languageCode
     *
     * @param string $languageCode
     * @return Ap
     */
    public function setLanguageCode($languageCode)
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * Get languageCode
     *
     * @return string 
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * Set ponumber
     *
     * @param string $ponumber
     * @return Ap
     */
    public function setPonumber($ponumber)
    {
        $this->ponumber = $ponumber;

        return $this;
    }

    /**
     * Get ponumber
     *
     * @return string 
     */
    public function getPonumber()
    {
        return $this->ponumber;
    }

    /**
     * Set shippingpoint
     *
     * @param string $shippingpoint
     * @return Ap
     */
    public function setShippingpoint($shippingpoint)
    {
        $this->shippingpoint = $shippingpoint;

        return $this;
    }

    /**
     * Get shippingpoint
     *
     * @return string 
     */
    public function getShippingpoint()
    {
        return $this->shippingpoint;
    }

    /**
     * Set onHold
     *
     * @param boolean $onHold
     * @return Ap
     */
    public function setOnHold($onHold)
    {
        $this->onHold = $onHold;

        return $this;
    }

    /**
     * Get onHold
     *
     * @return boolean 
     */
    public function getOnHold()
    {
        return $this->onHold;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Ap
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set reverse
     *
     * @param boolean $reverse
     * @return Ap
     */
    public function setReverse($reverse)
    {
        $this->reverse = $reverse;

        return $this;
    }

    /**
     * Get reverse
     *
     * @return boolean 
     */
    public function getReverse()
    {
        return $this->reverse;
    }

    /**
     * Set terms
     *
     * @param integer $terms
     * @return Ap
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get terms
     *
     * @return integer 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ap
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set forceClosed
     *
     * @param boolean $forceClosed
     * @return Ap
     */
    public function setForceClosed($forceClosed)
    {
        $this->forceClosed = $forceClosed;

        return $this;
    }

    /**
     * Get forceClosed
     *
     * @return boolean 
     */
    public function getForceClosed()
    {
        return $this->forceClosed;
    }

    /**
     * Set crdate
     *
     * @param \DateTime $crdate
     * @return Ap
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;

        return $this;
    }

    /**
     * Get crdate
     *
     * @return \DateTime 
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set isReturn
     *
     * @param boolean $isReturn
     * @return Ap
     */
    public function setIsReturn($isReturn)
    {
        $this->isReturn = $isReturn;

        return $this;
    }

    /**
     * Get isReturn
     *
     * @return boolean 
     */
    public function getIsReturn()
    {
        return $this->isReturn;
    }
    
    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Ar
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Ar
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return Ar
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set lastModifiedDate
     *
     * @param \DateTime $lastModifiedDate
     * @return Ar
     */
    public function setLastModifiedDate($lastModifiedDate)
    {
        $this->lastModifiedDate = $lastModifiedDate;

        return $this;
    }

    /**
     * Get lastModifiedDate
     *
     * @return \DateTime 
     */
    public function getLastModifiedDate()
    {
        return $this->lastModifiedDate;
    }

    /**
     * Set inactiveDate
     *
     * @param \DateTime $inactiveDate
     * @return Ar
     */
    public function setInactiveDate($inactiveDate)
    {
        $this->inactiveDate = $inactiveDate;

        return $this;
    }

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate()
    {
        return $this->inactiveDate;
    }
    
    /**
     * Set transaction
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transaction
     * @return Ap
     */
    public function setTransaction(\Morus\AcceticBundle\Model\TransactionInterface $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \Morus\AcceticBundle\Model\TransactionInterface 
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return Ap
     */
    public function setUnit(\Morus\AcceticBundle\Model\UnitInterface $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Morus\AcceticBundle\Model\UnitInterface 
     */
    public function getUnit()
    {
        return $this->unit;
    }
}
