<?php

namespace Morus\AcceticBundle\Model;

/**
 * UnitClass
 */
interface UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
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
     * @return UnitClassInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
