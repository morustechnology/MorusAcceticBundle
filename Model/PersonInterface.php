<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 */
interface PersonInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set isPrimary
     *
     * @param boolean $isPrimary
     * @return PersonInterface
     */
    public function setIsPrimary($isPrimary);

    /**
     * Get isPrimary
     *
     * @return boolean 
     */
    public function getIsPrimary();

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return PersonInterface
     */
    public function setFirstName($firstName);

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName();

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return PersonInterface
     */
    public function setMiddleName($middleName);

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName();

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return PersonInterface
     */
    public function setLastName($lastName);

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName();

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return PersonInterface
     */
    public function setBirthdate($birthdate);

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate();

    /**
     * Set personalId
     *
     * @param string $personalId
     * @return PersonInterface
     */
    public function setPersonalId($personalId);

    /**
     * Get personalId
     *
     * @return string 
     */
    public function getPersonalId();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return PersonInterface
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
     * @return PersonInterface
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
     * @return PersonInterface
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
     * @return PersonInterface
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
     * @return PersonInterface
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
     * @return PersonInterface
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
     * Set unit
     *
     * @param \Morus\AcceticBundle\Model\UnitInterface $unit
     * @return PersonInterface
     */
    public function setUnit(\Morus\AcceticBundle\Model\UnitInterface $unit = null);

    /**
     * Get unit
     *
     * @return \Morus\AcceticBundle\Model\UnitInterface 
     */
    public function getUnit();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
