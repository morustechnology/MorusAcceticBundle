<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ap
 */
class Ap implements \Morus\AcceticBundle\Model\ApInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $invnumber;

    /**
     * @var \DateTime
     */
    private $transdate;

    /**
     * @var boolean
     */
    private $taxincluded;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var string
     */
    private $netamount;

    /**
     * @var string
     */
    private $paid;

    /**
     * @var \DateTime
     */
    private $datepaid;

    /**
     * @var \DateTime
     */
    private $duedate;

    /**
     * @var boolean
     */
    private $invoice;

    /**
     * @var string
     */
    private $ordnumber;

    /**
     * @var string
     */
    private $curr;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $till;

    /**
     * @var string
     */
    private $quonumber;

    /**
     * @var string
     */
    private $intnotes;

    /**
     * @var string
     */
    private $shipvia;

    /**
     * @var string
     */
    private $languageCode;

    /**
     * @var string
     */
    private $ponumber;

    /**
     * @var string
     */
    private $shippingpoint;

    /**
     * @var boolean
     */
    private $onHold;

    /**
     * @var boolean
     */
    private $approved;

    /**
     * @var boolean
     */
    private $reverse;

    /**
     * @var integer
     */
    private $terms;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $forceClosed;

    /**
     * @var \DateTime
     */
    private $crdate;

    /**
     * @var boolean
     */
    private $isReturn;

    /**
     * @var \Morus\AcceticBundle\Model\TransactionInterface
     */
    private $transaction;

    /**
     * @var \Morus\AcceticBundle\Model\UnitInterface
     */
    private $unit;


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
}
