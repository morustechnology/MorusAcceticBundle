<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ar
 */
interface ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
     */
    public function setAmount($amount);

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount();

    /**
     * Set netAmount
     *
     * @param string $netAmount
     * @return ArInterface
     */
    public function setNetAmount($netAmount);

    /**
     * Get netAmount
     *
     * @return string 
     */
    public function getNetAmount();

    /**
     * Set paid
     *
     * @param string $paid
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
     */
    public function setInvoice($invoice);

    /**
     * Get invoice
     *
     * @return boolean 
     */
    public function getInvoice();

    /**
     * Set shippingpoint
     *
     * @param string $shippingpoint
     * @return ArInterface
     */
    public function setShippingpoint($shippingpoint);

    /**
     * Get shippingpoint
     *
     * @return string 
     */
    public function getShippingpoint();

    /**
     * Set terms
     *
     * @param integer $terms
     * @return ArInterface
     */
    public function setTerms($terms);

    /**
     * Get terms
     *
     * @return integer 
     */
    public function getTerms();

    /**
     * Set reference
     *
     * @param string $reference
     * @return ArInterface
     */
    public function setReference($reference);

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference();

    /**
     * Set notes
     *
     * @param string $notes
     * @return ArInterface
     */
    public function setNotes($notes);

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes();

    /**
     * Set curr
     *
     * @param string $curr
     * @return ArInterface
     */
    public function setCurr($curr);

    /**
     * Get curr
     *
     * @return string 
     */
    public function getCurr();

    /**
     * Set ordnumber
     *
     * @param string $ordnumber
     * @return ArInterface
     */
    public function setOrdnumber($ordnumber);

    /**
     * Get ordnumber
     *
     * @return string 
     */
    public function getOrdnumber();

    /**
     * Set till
     *
     * @param string $till
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
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
     * @return ArInterface
     */
    public function setPonumber($ponumber);

    /**
     * Get ponumber
     *
     * @return string 
     */
    public function getPonumber();

    /**
     * Set onHold
     *
     * @param boolean $onHold
     * @return ArInterface
     */
    public function setOnHold($onHold);

    /**
     * Get onHold
     *
     * @return boolean 
     */
    public function getOnHold();

    /**
     * Set reverse
     *
     * @param boolean $reverse
     * @return ArInterface
     */
    public function setReverse($reverse);

    /**
     * Get reverse
     *
     * @return boolean 
     */
    public function getReverse();

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return ArInterface
     */
    public function setApproved($approved);

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved();

    /**
     * Set forceClosed
     *
     * @param boolean $forceClosed
     * @return ArInterface
     */
    public function setForceClosed($forceClosed);

    /**
     * Get forceClosed
     *
     * @return boolean 
     */
    public function getForceClosed();

    /**
     * Set description
     *
     * @param string $description
     * @return ArInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription();

    /**
     * Set isReturn
     *
     * @param boolean $isReturn
     * @return ArInterface
     */
    public function setIsReturn($isReturn);

    /**
     * Get isReturn
     *
     * @return boolean 
     */
    public function getIsReturn();

    /**
     * Set crdate
     *
     * @param \DateTime $crdate
     * @return ArInterface
     */
    public function setCrdate($crdate);
    
    /**
     * Get crdate
     *
     * @return \DateTime 
     */
    public function getCrdate();

    /**
     * Set printed
     *
     * @param boolean $printed
     * @return ArInterface
     */
    public function setPrinted($printed);

    /**
     * Get printed
     *
     * @return boolean 
     */
    public function getPrinted();

    /**
     * Set emailed
     *
     * @param boolean $emailed
     * @return ArInterface
     */
    public function setEmailed($emailed);

    /**
     * Get emailed
     *
     * @return boolean 
     */
    public function getEmailed();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ArInterface
     */
    public function setSortOrder($sortOrder);

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder();

    /**
     * Set active
     *
     * @param boolean $active
     * @return ArInterface
     */
    public function setActive($active);

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive();

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return ArInterface
     */
    public function setCreateDate($createDate);

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate();

    /**
     * Set lastModifiedDate
     *
     * @param \DateTime $lastModifiedDate
     * @return ArInterface
     */
    public function setLastModifiedDate($lastModifiedDate);

    /**
     * Get lastModifiedDate
     *
     * @return \DateTime 
     */
    public function getLastModifiedDate();

    /**
     * Set inactiveDate
     *
     * @param \DateTime $inactiveDate
     * @return ArInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Set transaction
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transaction
     * @return ArInterface
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
     * @return ArInterface
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
