<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 */
class Contact implements \Morus\AcceticBundle\Model\ContactInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

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
     * @var \Morus\AcceticBundle\Model\UnitInterface
     */
    private $unit;

    /**
     * @var \Morus\AcceticBundle\Model\PersonInterface
     */
    private $person;

    /**
     * @var \Morus\AcceticBundle\Model\ContactClassInterface
     */
    private $contactClass;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setCreateDate(new \DateTime("now"));
        $this->setActive(true);
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
