<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 */
interface UnitInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     * @return UnitInterface
     */
    public function setAccountNumber($accountNumber);

    /**
     * Get accountNumber
     *
     * @return string 
     */
    public function getAccountNumber();

    /**
     * Set name
     *
     * @param string $name
     * @return UnitInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string 
     */
    public function getName();

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return UnitInterface
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
     * @return UnitInterface
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
     * @return UnitInterface
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
     * @return UnitInterface
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
     * @return UnitInterface
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
     * @return UnitInterface
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
     * Add persons
     *
     * @param \Morus\AcceticBundle\Model\PersonInterface $persons
     * @return UnitInterface
     */
    public function addPerson(\Morus\AcceticBundle\Model\PersonInterface $persons);

    /**
     * Remove persons
     *
     * @param \Morus\AcceticBundle\Model\PersonInterface $persons
     */
    public function removePerson(\Morus\AcceticBundle\Model\PersonInterface $persons);

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons();

    /**
     * Add locations
     *
     * @param \Morus\AcceticBundle\Model\LocationInterface $locations
     * @return UnitInterface
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
     * Add unitClasses
     *
     * @param \Morus\AcceticBundle\Model\UnitClassInterface $unitClasses
     * @return UnitInterface
     */
    public function addUnitClass(\Morus\AcceticBundle\Model\UnitClassInterface $unitClasses);

    /**
     * Remove unitClasses
     *
     * @param \Morus\AcceticBundle\Model\UnitClass $unitClassesInterface
     */
    public function removeUnitClass(\Morus\AcceticBundle\Model\UnitClassInterface $unitClasses);

    /**
     * Get unitClasses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnitClasses();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
