<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceNote
 */
class InvoiceNote implements \Morus\AcceticBundle\Model\InvoiceNoteInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $noteClass;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $subject;

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
     * @var \Morus\AcceticBundle\Model\InvoiceInterface
     */
    private $invoice;


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
     * Set noteClass
     *
     * @param integer $noteClass
     * @return InvoiceNote
     */
    public function setNoteClass($noteClass)
    {
        $this->noteClass = $noteClass;

        return $this;
    }

    /**
     * Get noteClass
     *
     * @return integer 
     */
    public function getNoteClass()
    {
        return $this->noteClass;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return InvoiceNote
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return InvoiceNote
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return InvoiceNote
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
     * @return InvoiceNote
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
     * @return InvoiceNote
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
     * @return InvoiceNote
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
     * @return InvoiceNote
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
     * Set invoice
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoice
     * @return InvoiceNote
     */
    public function setInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \Morus\AcceticBundle\Model\InvoiceInterface 
     */
    public function getInvoice()
    {
        return $this->invoice;
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
