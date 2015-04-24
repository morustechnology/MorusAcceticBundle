<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="accetic_transaction")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Transaction implements \Morus\AcceticBundle\Model\TransactionInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="table_name", type="text", nullable=true)
     */
    protected $tableName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true)
     */
    protected $approved;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="approved_at", type="datetime", nullable=true)
     */
    protected $approvedAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    protected $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    protected $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified_date", type="datetime", nullable=true)
     */
    protected $lastModifiedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inactive_date", type="datetime", nullable=true)
     */
    protected $inactiveDate;

    /**
     * @var \Morus\AcceticBundle\Model\ArInterface
     *
     * @ORM\OneToOne(targetEntity="Morus\AcceticBundle\Model\ArInterface", mappedBy="transaction", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $ar;

    /**
     * @var \Morus\AcceticBundle\Model\ApInterface
     *
     * @ORM\OneToOne(targetEntity="Morus\AcceticBundle\Model\ApInterface", mappedBy="transaction", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $ap;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\InvoiceInterface", mappedBy="transaction", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $invoices;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createDate = new \DateTime("now");
        $this->active = true;
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
