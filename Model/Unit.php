<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 */
abstract class Unit implements UnitInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var string
     */
    protected $name;

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
    protected $contacts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $persons;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $locations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $transactions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $ars;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $aps;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $unitClasses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ars = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aps = new \Doctrine\Common\Collections\ArrayCollection();
        $this->unitClasses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set accountNumber
     *
     * @param string $accountNumber
     * @return Unit
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string 
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Unit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * @return Unit
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
     * Add contacts
     *
     * @param Contact $contacts
     * @return Unit
     */
    public function addContact(ContactInterface $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param Contact $contacts
     */
    public function removeContact(ContactInterface $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add persons
     *
     * @param Person $persons
     * @return Unit
     */
    public function addPerson(PersonInterface $persons)
    {
        $this->persons[] = $persons;

        return $this;
    }

    /**
     * Remove persons
     *
     * @param Person $persons
     */
    public function removePerson(PersonInterface $persons)
    {
        $this->persons->removeElement($persons);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Add locations
     *
     * @param Location $locations
     * @return Unit
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
     * Add transactions
     *
     * @param Transaction $transactions
     * @return Unit
     */
    public function addTransaction(TransactionInterface $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param Transaction $transactions
     */
    public function removeTransaction(TransactionInterface $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Add ars
     *
     * @param Ar $ars
     * @return Unit
     */
    public function addAr(ArInterface $ars)
    {
        $this->ars[] = $ars;

        return $this;
    }

    /**
     * Remove ars
     *
     * @param Ar $ars
     */
    public function removeAr(ArInterface $ars)
    {
        $this->ars->removeElement($ars);
    }

    /**
     * Get ars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArs()
    {
        return $this->ars;
    }

    /**
     * Add aps
     *
     * @param Ap $aps
     * @return Unit
     */
    public function addAp(ApInterface $aps)
    {
        $this->aps[] = $aps;

        return $this;
    }

    /**
     * Remove aps
     *
     * @param Ap $aps
     */
    public function removeAp(ApInterface $aps)
    {
        $this->aps->removeElement($aps);
    }

    /**
     * Get aps
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAps()
    {
        return $this->aps;
    }

    /**
     * Add unitClasses
     *
     * @param UnitClass $unitClasses
     * @return Unit
     */
    public function addUnitClass(UnitClassInterface $unitClasses)
    {
        $this->unitClasses[] = $unitClasses;

        return $this;
    }

    /**
     * Remove unitClasses
     *
     * @param UnitClass $unitClasses
     */
    public function removeUnitClass(UnitClassInterface $unitClasses)
    {
        $this->unitClasses->removeElement($unitClasses);
    }

    /**
     * Get unitClasses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnitClasses()
    {
        return $this->unitClasses;
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
