<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="accetic_location")
 ** @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Location implements \Morus\AcceticBundle\Model\LocationInterface
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
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="line_one", type="text", nullable=true)
     */
    private $lineOne;

    /**
     * @var string
     *
     * @ORM\Column(name="line_two", type="text", nullable=true)
     */
    private $lineTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="line_three", type="text", nullable=true)
     */
    private $lineThree;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=500, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=500, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=80, nullable=true)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=500, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="attention", type="string", length=800, nullable=true)
     */
    private $attention;

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
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\UnitInterface", inversedBy="locations", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     * })
     */
    private $unit;

    /**
     * @var \Morus\AcceticBundle\Model\LocationClassInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\LocationClassInterface", inversedBy="locations", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_class_id", referencedColumnName="id")
     * })
     */
    private $locationClass;
    
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
     * Set address
     *
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set lineOne
     *
     * @param string $lineOne
     * @return Location
     */
    public function setLineOne($lineOne)
    {
        $this->lineOne = $lineOne;

        return $this;
    }

    /**
     * Get lineOne
     *
     * @return string 
     */
    public function getLineOne()
    {
        return $this->lineOne;
    }

    /**
     * Set lineTwo
     *
     * @param string $lineTwo
     * @return Location
     */
    public function setLineTwo($lineTwo)
    {
        $this->lineTwo = $lineTwo;

        return $this;
    }

    /**
     * Get lineTwo
     *
     * @return string 
     */
    public function getLineTwo()
    {
        return $this->lineTwo;
    }

    /**
     * Set lineThree
     *
     * @param string $lineThree
     * @return Location
     */
    public function setLineThree($lineThree)
    {
        $this->lineThree = $lineThree;

        return $this;
    }

    /**
     * Get lineThree
     *
     * @return string 
     */
    public function getLineThree()
    {
        return $this->lineThree;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Location
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Location
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Location
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set attention
     *
     * @param string $attention
     * @return Location
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;

        return $this;
    }

    /**
     * Get attention
     *
     * @return string 
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Location
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
     * @return Location
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
     * @return Location
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
     * @return Location
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
     * @return Location
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
     * @return Location
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
     * Set locationClass
     *
     * @param \Morus\AcceticBundle\Model\LocationClassInterface $locationClass
     * @return Location
     */
    public function setLocationClass(\Morus\AcceticBundle\Model\LocationClassInterface $locationClass = null)
    {
        $this->locationClass = $locationClass;

        return $this;
    }

    /**
     * Get locationClass
     *
     * @return \Morus\AcceticBundle\Model\LocationClassInterface 
     */
    public function getLocationClass()
    {
        return $this->locationClass;
    }
    
    /*
     * Dummy Function - Set Location Class Control Code
     */
    public function setLocationClassControlCode()
    {

    }

    /*
     * Get Location Class Control Code
     */
    public function getLocationClassControlCode()
    {
        return $this->locationClass->getControlCode();
    }
}
