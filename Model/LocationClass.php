<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocationClass
 */
abstract class LocationClass implements LocationClassInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $controlCode;

    /**
     * @var string
     */
    protected $class;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $locations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set controlCode
     *
     * @param string $controlCode
     * @return LocationClass
     */
    public function setControlCode($controlCode)
    {
        $this->controlCode = $controlCode;

        return $this;
    }

    /**
     * Get controlCode
     *
     * @return string 
     */
    public function getControlCode()
    {
        return $this->controlCode;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return LocationClass
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return LocationClass
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
     * @return LocationClass
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
     * @return LocationClass
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
     * @return LocationClass
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
     * @return LocationClass
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
     * @return LocationClass
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
     * Add locations
     *
     * @param Location $locations
     * @return LocationClass
     */
    public function addLocation(LocationInterface $locations)
    {
        $this->locations[] = $locations;

        return $this;
    }

    /**
     * Remove locations
     *
     * @param Location $locations
     */
    public function removeLocation(LocationInterface $locations)
    {
        $this->locations->removeElement($locations);
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocations()
    {
        return $this->locations;
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
