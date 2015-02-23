<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 */
interface TransactionInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set tableName
     *
     * @param string $tableName
     * @return TransactionInterface
     */
    public function setTableName($tableName);

    /**
     * Get tableName
     *
     * @return string 
     */
    public function getTableName();

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return TransactionInterface
     */
    public function setApproved($approved);

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved();

    /**
     * Set approvedAt
     *
     * @param \DateTime $approvedAt
     * @return TransactionInterface
     */
    public function setApprovedAt($approvedAt);

    /**
     * Get approvedAt
     *
     * @return \DateTime 
     */
    public function getApprovedAt();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return TransactionInterface
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
     * @return TransactionInterface
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
     * @return TransactionInterface
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
     * @return TransactionInterface
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
     * @return TransactionInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Set ar
     *
     * @param \Morus\AcceticBundle\Model\ArInterface $ar
     * @return TransactionInterface
     */
    public function setAr(\Morus\AcceticBundle\Model\ArInterface $ar = null);

    /**
     * Get ar
     *
     * @return \Morus\AcceticBundle\Model\ArInterface 
     */
    public function getAr();

    /**
     * Set ap
     *
     * @param \Morus\AcceticBundle\Model\ApInterface $ap
     * @return TransactionInterface
     */
    public function setAp(\Morus\AcceticBundle\Model\ApInterface $ap = null);

    /**
     * Get ap
     *
     * @return \Morus\AcceticBundle\Model\ApInterface 
     */
    public function getAp();

    /**
     * Add invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     * @return TransactionInterface
     */
    public function addInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices);

    /**
     * Remove invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     */
    public function removeInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices);
    
    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoices();

    /**
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return TransactionInterface
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
