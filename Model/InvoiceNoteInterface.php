<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceNote
 */
interface InvoiceNoteInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set noteClass
     *
     * @param integer $noteClass
     * @return InvoiceNoteInterface
     */
    public function setNoteClass($noteClass);

    /**
     * Get noteClass
     *
     * @return integer 
     */
    public function getNoteClass();

    /**
     * Set note
     *
     * @param string $note
     * @return InvoiceNoteInterface
     */
    public function setNote($note);

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote();

    /**
     * Set subject
     *
     * @param string $subject
     * @return InvoiceNoteInterface
     */
    public function setSubject($subject);

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return InvoiceNoteInterface
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
     * @return InvoiceNoteInterface
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
     * @return InvoiceNoteInterface
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
     * @return InvoiceNoteInterface
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
     * @return InvoiceNoteInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Set invoice
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoice
     * @return InvoiceNoteInterface
     */
    public function setInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoice = null);

    /**
     * Get invoice
     *
     * @return \Morus\AcceticBundle\Model\InvoiceInterface 
     */
    public function getInvoice();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();
    
    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
