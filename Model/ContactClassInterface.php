<?php

namespace Morus\AcceticBundle\Model;

/**
 * ContactClass
 */
interface ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
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
     * @return ContactClassInterface
     */
    public function setInactiveDate($inactiveDate);

    /**
     * Get inactiveDate
     *
     * @return \DateTime 
     */
    public function getInactiveDate();

    /**
     * Add contacts
     *
     * @param \Morus\AcceticBundle\Model\ContactInterface $contacts
     * @return ContactClassInterface
     */
    public function addContact(\Morus\AcceticBundle\Model\ContactInterface $contacts);

    /**
     * Remove contacts
     *
     * @param \Morus\AcceticBundle\Model\ContactInterface $contacts
     */
    public function removeContact(\Morus\AcceticBundle\Model\ContactInterface $contacts);

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
