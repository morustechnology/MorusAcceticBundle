<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="accetic_invoice", indexes={@ORM\Index(name="invoice_trans_id_key", columns={"transaction_id"}), @ORM\Index(name="IDX_parts_id", columns={"parts_id"})})
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class Invoice implements \Morus\AcceticBundle\Model\InvoiceInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="qty", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $qty;

    /**
     * @var string
     *
     * @ORM\Column(name="allocated", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $allocated;

    /**
     * @var string
     *
     * @ORM\Column(name="sellprice", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $sellprice;

    /**
     * @var string
     *
     * @ORM\Column(name="fxsellprice", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $fxsellprice;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=10, scale=2, nullable=true)
     */
    protected $discount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="assemblyitem", type="boolean", nullable=true)
     */
    protected $assemblyitem;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", nullable=true)
     */
    protected $unit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deliverydate", type="date", nullable=true)
     */
    protected $deliverydate;

    /**
     * @var string
     *
     * @ORM\Column(name="serialnumber", type="text", nullable=true)
     */
    protected $serialnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="vendor_sku", type="text", nullable=true)
     */
    protected $vendorSku;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\InvoiceNoteInterface", mappedBy="invoice", orphanRemoval=true)
     */
    protected $invoiceNotes;

    /**
     * @var \Morus\AcceticBundle\Model\PartsInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\PartsInterface", inversedBy="invoices", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parts_id", referencedColumnName="id")
     * })
     */
    protected $parts;

    /**
     * @var \Morus\AcceticBundle\Model\TransactionInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\TransactionInterface", inversedBy="invoices", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transaction_id", referencedColumnName="id")
     * })
     */
    protected $transaction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceNotes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Invoice
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
     * Set qty
     *
     * @param string $qty
     * @return Invoice
     */
    public function setQty($qty)
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get qty
     *
     * @return string 
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * Set allocated
     *
     * @param string $allocated
     * @return Invoice
     */
    public function setAllocated($allocated)
    {
        $this->allocated = $allocated;

        return $this;
    }

    /**
     * Get allocated
     *
     * @return string 
     */
    public function getAllocated()
    {
        return $this->allocated;
    }

    /**
     * Set sellprice
     *
     * @param string $sellprice
     * @return Invoice
     */
    public function setSellprice($sellprice)
    {
        $this->sellprice = $sellprice;

        return $this;
    }

    /**
     * Get sellprice
     *
     * @return string 
     */
    public function getSellprice()
    {
        return $this->sellprice;
    }

    /**
     * Set fxsellprice
     *
     * @param string $fxsellprice
     * @return Invoice
     */
    public function setFxsellprice($fxsellprice)
    {
        $this->fxsellprice = $fxsellprice;

        return $this;
    }

    /**
     * Get fxsellprice
     *
     * @return string 
     */
    public function getFxsellprice()
    {
        return $this->fxsellprice;
    }

    /**
     * Set discount
     *
     * @param string $discount
     * @return Invoice
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set assemblyitem
     *
     * @param boolean $assemblyitem
     * @return Invoice
     */
    public function setAssemblyitem($assemblyitem)
    {
        $this->assemblyitem = $assemblyitem;

        return $this;
    }

    /**
     * Get assemblyitem
     *
     * @return boolean 
     */
    public function getAssemblyitem()
    {
        return $this->assemblyitem;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return Invoice
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set deliverydate
     *
     * @param \DateTime $deliverydate
     * @return Invoice
     */
    public function setDeliverydate($deliverydate)
    {
        $this->deliverydate = $deliverydate;

        return $this;
    }

    /**
     * Get deliverydate
     *
     * @return \DateTime 
     */
    public function getDeliverydate()
    {
        return $this->deliverydate;
    }

    /**
     * Set serialnumber
     *
     * @param string $serialnumber
     * @return Invoice
     */
    public function setSerialnumber($serialnumber)
    {
        $this->serialnumber = $serialnumber;

        return $this;
    }

    /**
     * Get serialnumber
     *
     * @return string 
     */
    public function getSerialnumber()
    {
        return $this->serialnumber;
    }

    /**
     * Set vendorSku
     *
     * @param string $vendorSku
     * @return Invoice
     */
    public function setVendorSku($vendorSku)
    {
        $this->vendorSku = $vendorSku;

        return $this;
    }

    /**
     * Get vendorSku
     *
     * @return string 
     */
    public function getVendorSku()
    {
        return $this->vendorSku;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Invoice
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
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Invoice
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
     * @return Invoice
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
     * @return Invoice
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
     * @return Invoice
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
     * @return Invoice
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
     * Add invoiceNotes
     *
     * @param \Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes
     * @return Invoice
     */
    public function addInvoiceNote(\Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes)
    {
        $this->invoiceNotes[] = $invoiceNotes;

        return $this;
    }

    /**
     * Remove invoiceNotes
     *
     * @param \Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes
     */
    public function removeInvoiceNote(\Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes)
    {
        $this->invoiceNotes->removeElement($invoiceNotes);
    }

    /**
     * Get invoiceNotes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoiceNotes()
    {
        return $this->invoiceNotes;
    }

    /**
     * Set parts
     *
     * @param \Morus\AcceticBundle\Model\PartsInterface $parts
     * @return Invoice
     */
    public function setParts(\Morus\AcceticBundle\Model\PartsInterface $parts = null)
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * Get parts
     *
     * @return \Morus\AcceticBundle\Model\PartsInterface 
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Set transaction
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transaction
     * @return Invoice
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
}
