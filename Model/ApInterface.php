<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ap
 */
interface ApInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set invnumber
     *
     * @param string $invnumber
     * @return ApInterface
     */
    public function setInvnumber($invnumber);

    /**
     * Get invnumber
     *
     * @return string 
     */
    public function getInvnumber();

    /**
     * Set transdate
     *
     * @param \DateTime $transdate
     * @return ApInterface
     */
    public function setTransdate($transdate);

    /**
     * Get transdate
     *
     * @return \DateTime 
     */
    public function getTransdate();

    /**
     * Set taxincluded
     *
     * @param boolean $taxincluded
     * @return ApInterface
     */
    public function setTaxincluded($taxincluded);

    /**
     * Get taxincluded
     *
     * @return boolean 
     */
    public function getTaxincluded();

    /**
     * Set amount
     *
     * @param string $amount
     * @return ApInterface
     */
    public function setAmount($amount);

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount();

    /**
     * Set netamount
     *
     * @param string $netamount
     * @return ApInterface
     */
    public function setNetamount($netamount);

    /**
     * Get netamount
     *
     * @return string 
     */
    public function getNetamount();

    /**
     * Set paid
     *
     * @param string $paid
     * @return ApInterface
     */
    public function setPaid($paid);

    /**
     * Get paid
     *
     * @return string 
     */
    public function getPaid();

    /**
     * Set datepaid
     *
     * @param \DateTime $datepaid
     * @return ApInterface
     */
    public function setDatepaid($datepaid);

    /**
     * Get datepaid
     *
     * @return \DateTime 
     */
    public function getDatepaid();

    /**
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return ApInterface
     */
    public function setDuedate($duedate);

    /**
     * Get duedate
     *
     * @return \DateTime 
     */
    public function getDuedate();

    /**
     * Set invoice
     *
     * @param boolean $invoice
     * @return ApInterface
     */
    public function setInvoice($invoice);

    /**
     * Get invoice
     *
     * @return boolean 
     */
    public function getInvoice();

    /**
     * Set ordnumber
     *
     * @param string $ordnumber
     * @return ApInterface
     */
    public function setOrdnumber($ordnumber);

    /**
     * Get ordnumber
     *
     * @return string 
     */
    public function getOrdnumber();

    /**
     * Set curr
     *
     * @param string $curr
     * @return ApInterface
     */
    public function setCurr($curr);

    /**
     * Get curr
     *
     * @return string 
     */
    public function getCurr();

    /**
     * Set notes
     *
     * @param string $notes
     * @return ApInterface
     */
    public function setNotes($notes);

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes();

    /**
     * Set till
     *
     * @param string $till
     * @return ApInterface
     */
    public function setTill($till);

    /**
     * Get till
     *
     * @return string 
     */
    public function getTill();

    /**
     * Set quonumber
     *
     * @param string $quonumber
     * @return ApInterface
     */
    public function setQuonumber($quonumber);

    /**
     * Get quonumber
     *
     * @return string 
     */
    public function getQuonumber();

    /**
     * Set intnotes
     *
     * @param string $intnotes
     * @return ApInterface
     */
    public function setIntnotes($intnotes);

    /**
     * Get intnotes
     *
     * @return string 
     */
    public function getIntnotes();

    /**
     * Set shipvia
     *
     * @param string $shipvia
     * @return ApInterface
     */
    public function setShipvia($shipvia);

    /**
     * Get shipvia
     *
     * @return string 
     */
    public function getShipvia();

    /**
     * Set languageCode
     *
     * @param string $languageCode
     * @return ApInterface
     */
    public function setLanguageCode($languageCode);

    /**
     * Get languageCode
     *
     * @return string 
     */
    public function getLanguageCode();

    /**
     * Set ponumber
     *
     * @param string $ponumber
     * @return ApInterface
     */
    public function setPonumber($ponumber);

    /**
     * Get ponumber
     *
     * @return string 
     */
    public function getPonumber();

    /**
     * Set shippingpoint
     *
     * @param string $shippingpoint
     * @return ApInterface
     */
    public function setShippingpoint($shippingpoint);

    /**
     * Get shippingpoint
     *
     * @return string 
     */
    public function getShippingpoint();

    /**
     * Set onHold
     *
     * @param boolean $onHold
     * @return ApInterface
     */
    public function setOnHold($onHold);

    /**
     * Get onHold
     *
     * @return boolean 
     */
    public function getOnHold();

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return ApInterface
     */
    public function setApproved($approved);

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved();

    /**
     * Set reverse
     *
     * @param boolean $reverse
     * @return ApInterface
     */
    public function setReverse($reverse);

    /**
     * Get reverse
     *
     * @return boolean 
     */
    public function getReverse();

    /**
     * Set terms
     *
     * @param integer $terms
     * @return ApInterface
     */
    public function setTerms($terms);

    /**
     * Get terms
     *
     * @return integer 
     */
    public function getTerms();

    /**
     * Set description
     *
     * @param string $description
     * @return ApInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription();

    /**
     * Set forceClosed
     *
     * @param boolean $forceClosed
     * @return ApInterface
     */
    public function setForceClosed($forceClosed);

    /**
     * Get forceClosed
     *
     * @return boolean 
     */
    public function getForceClosed();

    /**
     * Set crdate
     *
     * @param \DateTime $crdate
     * @return ApInterface
     */
    public function setCrdate($crdate);

    /**
     * Get crdate
     *
     * @return \DateTime 
     */
    public function getCrdate();

    /**
     * Set isReturn
     *
     * @param boolean $isReturn
     * @return ApInterface
     */
    public function setIsReturn($isReturn);
    
    /**
     * Get isReturn
     *
     * @return boolean 
     */
    public function getIsReturn();

    /**
     * Set transaction
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transaction
     * @return ApInterface
     */
    public function setTransaction(\Morus\AcceticBundle\Model\TransactionInterface $transaction = null);

    /**
     * Get transaction
     *
     * @return \Morus\AcceticBundle\Model\TransactionInterface 
     */
    public function getTransaction();

    /**
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return ApInterface
     */
    public function setUnit(\Morus\AcceticBundle\Model\UnitInterface $unit = null);

    /**
     * Get unit
     *
     * @return \Morus\AcceticBundle\Model\UnitInterface 
     */
    public function getUnit();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
