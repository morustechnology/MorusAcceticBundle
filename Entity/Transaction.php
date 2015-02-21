<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 */
class Transaction implements \Morus\AcceticBundle\Model\TransactionInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tableName;

    /**
     * @var boolean
     */
    private $approved;

    /**
     * @var \DateTime
     */
    private $approvedAt;

    /**
     * @var integer
     */
    private $sortOrder;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var \DateTime
     */
    private $lastModifiedDate;

    /**
     * @var \DateTime
     */
    private $inactiveDate;

    /**
     * @var \Morus\AcceticBundle\Entity\Ar
     */
    private $ar;

    /**
     * @var \Morus\AcceticBundle\Entity\Ap
     */
    private $ap;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $invoices;

    /**
     * @var \Morus\AcceticBundle\Entity\Unit
     */
    private $unit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tableName
     *
     * @param string $tableName
     * @return Transaction
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get tableName
     *
     * @return string 
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Transaction
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
     * Set approvedAt
     *
     * @param \DateTime $approvedAt
     * @return Transaction
     */
    public function setApprovedAt($approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * Get approvedAt
     *
     * @return \DateTime 
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
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
     * Set ar
     *
     * @param \Morus\AcceticBundle\Model\ArInterface $ar
     * @return Transaction
     */
    public function setAr(\Morus\AcceticBundle\Model\ArInterface $ar = null)
    {
        $this->ar = $ar;

        return $this;
    }

    /**
     * Get ar
     *
     * @return \Morus\AcceticBundle\Model\ArInterface 
     */
    public function getAr()
    {
        return $this->ar;
    }

    /**
     * Set ap
     *
     * @param \Morus\AcceticBundle\Model\ApInterface $ap
     * @return Transaction
     */
    public function setAp(\Morus\AcceticBundle\Model\ApInterface $ap = null)
    {
        $this->ap = $ap;

        return $this;
    }

    /**
     * Get ap
     *
     * @return \Morus\AcceticBundle\Model\ApInterface 
     */
    public function getAp()
    {
        return $this->ap;
    }

    /**
     * Add invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     * @return Transaction
     */
    public function addInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices)
    {
        $this->invoices[] = $invoices;

        return $this;
    }

    /**
     * Remove invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     */
    public function removeInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices)
    {
        $this->invoices->removeElement($invoices);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return Transaction
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
