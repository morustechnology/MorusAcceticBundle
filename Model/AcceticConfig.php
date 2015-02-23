<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcceticConfig
 */
interface AcceticConfigInterface
{
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();

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
     * @return AcceticConfig
     */
    public function setControlCode($controlCode);

    /**
     * Get controlCode
     *
     * @return string 
     */
    public function getControlCode();

    /**
     * Set value
     *
     * @param string $value
     * @return AcceticConfig
     */
    public function setValue($value);

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue();

    /**
     * Set name
     *
     * @param string $name
     * @return AcceticConfig
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string 
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();
}
