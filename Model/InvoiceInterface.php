<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 */
interface InvoiceInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set description
     *
     * @param string $description
     * @return InvoiceInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription();

    /**
     * Set qty
     *
     * @param string $qty
     * @return InvoiceInterface
     */
    public function setQty($qty);

    /**
     * Get qty
     *
     * @return string 
     */
    public function getQty();

    /**
     * Set allocated
     *
     * @param string $allocated
     * @return InvoiceInterface
     */
    public function setAllocated($allocated);

    /**
     * Get allocated
     *
     * @return string 
     */
    public function getAllocated();

    /**
     * Set sellprice
     *
     * @param string $sellprice
     * @return InvoiceInterface
     */
    public function setSellprice($sellprice);

    /**
     * Get sellprice
     *
     * @return string 
     */
    public function getSellprice();

    /**
     * Set precision
     *
     * @param integer $precision
     * @return InvoiceInterface
     */
    public function setPrecision($precision);

    /**
     * Get precision
     *
     * @return integer 
     */
    public function getPrecision();

    /**
     * Set fxsellprice
     *
     * @param string $fxsellprice
     * @return InvoiceInterface
     */
    public function setFxsellprice($fxsellprice);

    /**
     * Get fxsellprice
     *
     * @return string 
     */
    public function getFxsellprice();

    /**
     * Set discount
     *
     * @param string $discount
     * @return InvoiceInterface
     */
    public function setDiscount($discount);

    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount();

    /**
     * Set assemblyitem
     *
     * @param boolean $assemblyitem
     * @return InvoiceInterface
     */
    public function setAssemblyitem($assemblyitem);

    /**
     * Get assemblyitem
     *
     * @return boolean 
     */
    public function getAssemblyitem();

    /**
     * Set unit
     *
     * @param string $unit
     * @return InvoiceInterface
     */
    public function setUnit($unit);

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit();

    /**
     * Set deliverydate
     *
     * @param \DateTime $deliverydate
     * @return InvoiceInterface
     */
    public function setDeliverydate($deliverydate);

    /**
     * Get deliverydate
     *
     * @return \DateTime 
     */
    public function getDeliverydate();

    /**
     * Set serialnumber
     *
     * @param string $serialnumber
     * @return InvoiceInterface
     */
    public function setSerialnumber($serialnumber);

    /**
     * Get serialnumber
     *
     * @return string 
     */
    public function getSerialnumber();

    /**
     * Set vendorSku
     *
     * @param string $vendorSku
     * @return InvoiceInterface
     */
    public function setVendorSku($vendorSku);

    /**
     * Get vendorSku
     *
     * @return string 
     */
    public function getVendorSku();

    /**
     * Set notes
     *
     * @param string $notes
     * @return InvoiceInterface
     */
    public function setNotes($notes);

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return InvoiceInterface
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
     * @return InvoiceInterface
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
     * @return InvoiceInterface
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
     * @return InvoiceInterface
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
     * @return InvoiceInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Add invoiceNotes
     *
     * @param \Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes
     * @return InvoiceInterface
     */
    public function addInvoiceNote(\Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes);

    /**
     * Remove invoiceNotes
     *
     * @param \Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes
     */
    public function removeInvoiceNote(\Morus\AcceticBundle\Model\InvoiceNoteInterface $invoiceNotes);

    /**
     * Get invoiceNotes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoiceNotes();

    /**
     * Set parts
     *
     * @param \Morus\AcceticBundle\Model\Parts $parts
     * @return InvoiceInterface
     */
    public function setParts(\Morus\AcceticBundle\Model\PartsInterface $parts = null);

    /**
     * Get parts
     *
     * @return \Morus\AcceticBundle\Model\PartsInterface 
     */
    public function getParts();

    /**
     * Set transaction
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transaction
     * @return InvoiceInterface
     */
    public function setTransaction(\Morus\AcceticBundle\Model\TransactionInterface $transaction = null);

    /**
     * Get transaction
     *
     * @return \Morus\AcceticBundle\Model\TransactionInterface 
     */
    public function getTransaction();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
