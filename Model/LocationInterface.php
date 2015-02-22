<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 */
interface LocationInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set address
     *
     * @param string $address
     * @return LocationInterface
     */
    public function setAddress($address);

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress();

    /**
     * Set lineOne
     *
     * @param string $lineOne
     * @return LocationInterface
     */
    public function setLineOne($lineOne);

    /**
     * Get lineOne
     *
     * @return string 
     */
    public function getLineOne();

    /**
     * Set lineTwo
     *
     * @param string $lineTwo
     * @return LocationInterface
     */
    public function setLineTwo($lineTwo);

    /**
     * Get lineTwo
     *
     * @return string 
     */
    public function getLineTwo();

    /**
     * Set lineThree
     *
     * @param string $lineThree
     * @return LocationInterface
     */
    public function setLineThree($lineThree);

    /**
     * Get lineThree
     *
     * @return string 
     */
    public function getLineThree();

    /**
     * Set city
     *
     * @param string $city
     * @return LocationInterface
     */
    public function setCity($city);

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity();

    /**
     * Set state
     *
     * @param string $state
     * @return LocationInterface
     */
    public function setState($state);

    /**
     * Get state
     *
     * @return string 
     */
    public function getState();

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return LocationInterface
     */
    public function setZipCode($zipCode);

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode();

    /**
     * Set country
     *
     * @param string $country
     * @return LocationInterface
     */
    public function setCountry($country);

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry();

    /**
     * Set attention
     *
     * @param string $attention
     * @return LocationInterface
     */
    public function setAttention($attention);

    /**
     * Get attention
     *
     * @return string 
     */
    public function getAttention();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return LocationInterface
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
     * @return LocationInterface
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
     * @return LocationInterface
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
     * @return LocationInterface
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
     * @return LocationInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return LocationInterface
     */
    public function setUnit(\Morus\AcceticBundle\Model\UnitInterface $unit = null);

    /**
     * Get unit
     *
     * @return \Morus\AcceticBundle\Model\UnitInterface 
     */
    public function getUnit();

    /**
     * Set locationClass
     *
     * @param \Morus\AcceticBundle\Model\LocationClassInterface $locationClass
     * @return LocationInterface
     */
    public function setLocationClass(\Morus\AcceticBundle\Model\LocationClassInterface $locationClass = null);

    /**
     * Get locationClass
     *
     * @return \Morus\AcceticBundle\Model\LocationClassInterface 
     */
    public function getLocationClass();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
