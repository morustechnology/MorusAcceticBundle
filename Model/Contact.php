<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 */
abstract class Contact implements ContactInterface
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
     * @var Unit
     */
    protected $unit;

    /**
     * @var Person
     */
    protected $person;

    /**
     * @var ContactClass
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
     * @param Unit $unit
     * @return Contact
     */
    public function setUnit(UnitInterface $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set person
     *
     * @param Person $person
     * @return Contact
     */
    public function setPerson(PersonInterface $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set contactClass
     *
     * @param ContactClass $contactClass
     * @return Contact
     */
    public function setContactClass(ContactClassInterface $contactClass = null)
    {
        $this->contactClass = $contactClass;

        return $this;
    }

    /**
     * Get contactClass
     *
     * @return ContactClass 
     */
    public function getContactClass()
    {
        return $this->contactClass;
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
