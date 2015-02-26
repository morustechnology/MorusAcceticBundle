<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unit
 *
 * @ORM\Table(name="accetic_unit", uniqueConstraints={@ORM\UniqueConstraint(name="unit_id_key", columns={"id"}), @ORM\UniqueConstraint(name="unit_account_number_key", columns={"account_number"})}, indexes={@ORM\Index(name="IDX_account_number", columns={"account_number"})})
 * @ORM\MappedSuperclass(repositoryClass="Morus\AcceticBundle\Entity\Repository\UnitRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Unit implements \Morus\AcceticBundle\Model\UnitInterface
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
     * @ORM\Column(name="account_number", type="string", length=200, nullable=true)
     */
    private $accountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\ContactInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $contacts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\PersonInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $persons;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\LocationInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $locations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\TransactionInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $transactions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\ArInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $ars;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\ApInterface", mappedBy="unit", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $aps;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Morus\AcceticBundle\Model\UnitClassInterface", cascade={"persist"})
     * @ORM\JoinTable(name="accetic_units_to_unit_classes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="unit_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="unit_class_id", referencedColumnName="id")
     *   }
     * )
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
     * @param \Morus\AcceticBundle\Model\ContactInterface $contacts
     * @return Unit
     */
    public function addContact(\Morus\AcceticBundle\Model\ContactInterface $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \Morus\AcceticBundle\Model\ContactInterface $contacts
     */
    public function removeContact(\Morus\AcceticBundle\Model\ContactInterface $contacts)
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
     * @param \Morus\AcceticBundle\Model\PersonInterface $persons
     * @return Unit
     */
    public function addPerson(\Morus\AcceticBundle\Model\PersonInterface $persons)
    {
        $this->persons[] = $persons;

        return $this;
    }

    /**
     * Remove persons
     *
     * @param \Morus\AcceticBundle\Model\PersonInterface $persons
     */
    public function removePerson(\Morus\AcceticBundle\Model\PersonInterface $persons)
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
     * @param \Morus\AcceticBundle\Model\LocationInterface $locations
     * @return Unit
     */
    public function addLocation(\Morus\AcceticBundle\Model\LocationInterface $locations)
    {
        $this->locations[] = $locations;

        return $this;
    }

    /**
     * Remove locations
     *
     * @param \Morus\AcceticBundle\Model\LocationInterface $locations
     */
    public function removeLocation(\Morus\AcceticBundle\Model\LocationInterface $locations)
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
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transactions
     * @return Unit
     */
    public function addTransaction(\Morus\AcceticBundle\Model\TransactionInterface $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \Morus\AcceticBundle\Model\TransactionInterface $transactions
     */
    public function removeTransaction(\Morus\AcceticBundle\Model\TransactionInterface $transactions)
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
     * @param \Morus\AcceticBundle\Model\ArInterface $ars
     * @return Unit
     */
    public function addAr(\Morus\AcceticBundle\Model\ArInterface $ars)
    {
        $this->ars[] = $ars;

        return $this;
    }

    /**
     * Remove ars
     *
     * @param \Morus\AcceticBundle\Model\ArInterface $ars
     */
    public function removeAr(\Morus\AcceticBundle\Model\ArInterface $ars)
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
     * @param \Morus\AcceticBundle\Model\ApInterface $aps
     * @return Unit
     */
    public function addAp(\Morus\AcceticBundle\Model\ApInterface $aps)
    {
        $this->aps[] = $aps;

        return $this;
    }

    /**
     * Remove aps
     *
     * @param \Morus\AcceticBundle\Model\ApInterface $aps
     */
    public function removeAp(\Morus\AcceticBundle\Model\ApInterface $aps)
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
     * @param \Morus\AcceticBundle\Model\UnitClassInterface $unitClasses
     * @return Unit
     */
    public function addUnitClass(\Morus\AcceticBundle\Model\UnitClassInterface $unitClasses)
    {
        $this->unitClasses[] = $unitClasses;

        return $this;
    }

    /**
     * Remove unitClasses
     *
     * @param \Morus\AcceticBundle\Model\UnitClassInterface $unitClasses
     */
    public function removeUnitClass(\Morus\AcceticBundle\Model\UnitClassInterface $unitClasses)
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
}
