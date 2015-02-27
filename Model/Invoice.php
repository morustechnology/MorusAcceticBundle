<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 */
abstract class Invoice implements InvoiceInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $qty;

    /**
     * @var string
     */
    protected $allocated;

    /**
     * @var string
     */
    protected $sellprice;

    /**
     * @var string
     */
    protected $fxsellprice;

    /**
     * @var string
     */
    protected $discount;

    /**
     * @var boolean
     */
    protected $assemblyitem;

    /**
     * @var string
     */
    protected $unit;

    /**
     * @var \DateTime
     */
    protected $deliverydate;

    /**
     * @var string
     */
    protected $serialnumber;

    /**
     * @var string
     */
    protected $vendorSku;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var integer
     */
    protected $sortOrder;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var \DateTime
     */
    protected $createDate;

    /**
     * @var \DateTime
     */
    protected $lastModifiedDate;

    /**
     * @var \DateTime
     */
    protected $inactiveDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $invoiceNotes;

    /**
     * @var Parts
     */
    protected $parts;

    /**
     * @var Transaction
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
     * @param InvoiceNote $invoiceNotes
     * @return Invoice
     */
    public function addInvoiceNote(InvoiceNoteInterface $invoiceNotes)
    {
        $this->invoiceNotes[] = $invoiceNotes;

        return $this;
    }

    /**
     * Remove invoiceNotes
     *
     * @param InvoiceNote $invoiceNotes
     */
    public function removeInvoiceNote(InvoiceNoteInterface $invoiceNotes)
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
     * @param Parts $parts
     * @return Invoice
     */
    public function setParts(PartsInterface $parts = null)
    {
        $this->parts = $parts;

        return $this;
    }

    /**
     * Get parts
     *
     * @return Parts 
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Set transaction
     *
     * @param Transaction $transaction
     * @return Invoice
     */
    public function setTransaction(TransactionInterface $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return Transaction 
     */
    public function getTransaction()
    {
        return $this->transaction;
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
