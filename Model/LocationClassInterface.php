<?php

namespace Morus\AcceticBundle\Model;

/**
 * LocationClass
 */
interface LocationClassInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set controlCode
     *
     * @param string $controlCode
     * @return LocationClassInterface
     */
    public function setControlCode($controlCode);

    /**
     * Get controlCode
     *
     * @return string 
     */
    public function getControlCode();

    /**
     * Set class
     *
     * @param string $class
     * @return LocationClassInterface
     */
    public function setClass($class);

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass();

    /**
     * Set description
     *
     * @param string $description
     * @return LocationClassInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return LocationClassInterface
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
     * @return LocationClassInterface
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
     * @return LocationClassInterface
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
     * @return LocationClassInterface
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
     * @return LocationClassInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Add locations
     *
     * @param \Morus\AcceticBundle\Model\LocationInterface $locations
     * @return LocationClassInterface
     */
    public function addLocation(\Morus\AcceticBundle\Model\LocationInterface $locations);

    /**
     * Remove locations
     *
     * @param \Morus\AcceticBundle\Model\LocationInterface $locations
     */
    public function removeLocation(\Morus\AcceticBundle\Model\LocationInterface $locations);

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocations();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
