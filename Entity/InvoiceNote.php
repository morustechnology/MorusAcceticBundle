<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceNote
 *
 * @ORM\Table(name="accetic_invoice_note", indexes={@ORM\Index(name="IDX_entity_id", columns={"entity_id"})})
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class InvoiceNote implements \Morus\AcceticBundle\Model\InvoiceNoteInterface
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
     * @var integer
     *
     * @ORM\Column(name="note_class", type="integer", nullable=false)
     */
    protected $noteClass;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=false)
     */
    protected $note;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="text", nullable=true)
     */
    protected $subject;

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
     * @var \Morus\AcceticBundle\Model\InvoiceInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\InvoiceInterface", inversedBy="invoiceNotes", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entity_id", referencedColumnName="id")
     * })
     */
    protected $invoice;

    /**
     * Constructor
     */
    public function __construct()
    {
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
}
