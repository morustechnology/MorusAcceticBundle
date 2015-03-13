<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="accetic_contact", indexes={@ORM\Index(name="IDX_contact_class_id", columns={"contact_class_id"})})
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class Contact implements \Morus\AcceticBundle\Model\ContactInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified_date", type="datetime", nullable=true)
     */
    private $lastModifiedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inactive_date", type="datetime", nullable=true)
     */
    private $inactiveDate;

    /**
     * @var \Morus\AcceticBundle\Model\UnitInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\UnitInterface", inversedBy="contacts", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     * })
     */
    protected $unit;

    /**
     * @var \Morus\AcceticBundle\Model\PersonInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\PersonInterface", inversedBy="contacts", cascade={"persist"})
     * @ORM\JoinColumns({@ORM\JoinColumn(name="person_id", referencedColumnName="id")})
     */
    protected $person;

    /**
     * @var \Morus\AcceticBundle\Model\ContactClassInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\ContactClassInterface", inversedBy="contacts", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_class_id", referencedColumnName="id")
     * })
     */
    protected $contactClass;

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
     * Set description
     *
     * @param string $description
     * @return Contact
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
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return Contact
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
     * Set person
     *
     * @param \Morus\AcceticBundle\Model\PersonInterface $person
     * @return Contact
     */
    public function setPerson(\Morus\AcceticBundle\Model\PersonInterface $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Morus\AcceticBundle\Model\PersonInterface 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set contactClass
     *
     * @param \Morus\AcceticBundle\Model\ContactClassInterface $contactClass
     * @return Contact
     */
    public function setContactClass(\Morus\AcceticBundle\Model\ContactClassInterface $contactClass = null)
    {
        $this->contactClass = $contactClass;

        return $this;
    }

    /**
     * Get contactClass
     *
     * @return \Morus\AcceticBundle\Model\ContactClassInterface 
     */
    public function getContactClass()
    {
        return $this->contactClass;
    }
    
    /*
     * Dummy Function - Set Contact Class Control Code
     */
    public function setContactClassControlCode()
    {

    }

    /*
     * Get Contact Class Control Code
     */
    public function getContactClassControlCode()
    {
        return $this->contactClass->getControlCode();
    }
}
