<?php

namespace Morus\AcceticBundle\Model;

/**
 * ContactInterface
 */
interface ContactInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set description
     *
     * @param string $description
     * @return ContactInterface
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
     * @return ContactInterface
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
     * @return ContactInterface
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
     * @return ContactInterface
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
     * @return ContactInterface
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
     * @return ContactInterface
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
     * @return ContactInterface
     */
    public function setUnit(\Morus\AcceticBundle\Model\UnitInterface $unit = null);

    /**
     * Get unit
     *
     * @return \Morus\AcceticBundle\Model\UnitInterface 
     */
    public function getUnit();

    /**
     * Set person
     *
     * @param \Morus\AcceticBundle\Model\PersonInterface $person
     * @return ContactInterface
     */
    public function setPerson(\Morus\AcceticBundle\Model\PersonInterface $person = null);

    /**
     * Get person
     *
     * @return \Morus\AcceticBundle\Model\PersonInterface 
     */
    public function getPerson();

    /**
     * Set contactClass
     *
     * @param \Morus\AcceticBundle\Model\ContactClassInterface $contactClass
     * @return ContactInterface
     */
    public function setContactClass(\Morus\AcceticBundle\Model\ContactClassInterface $contactClass = null);

    /**
     * Get contactClass
     *
     * @return \Morus\AcceticBundle\Model\ContactClassInterface 
     */
    public function getContactClass();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
