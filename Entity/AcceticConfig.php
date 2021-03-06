<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcceticConfig
 *
 * @ORM\Table(name="accetic_config")
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class AcceticConfig implements \Morus\AcceticBundle\Model\AcceticConfigInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="control_code", type="string", length=50, nullable=false)
     */
    protected $controlCode;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=false)
     */
    protected $value;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    protected $sortOrder;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    protected $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime")
     */
    protected $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified_date", type="datetime", nullable=true)
     */
    protected $lastModifiedDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inactive_date", type="datetime", nullable=true)
     */
    protected $inactiveDate;
    
    /**
     * @var \Morus\AcceticBundle\Model\AcceticConfigGroupInterface
     *
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\AcceticConfigGroupInterface", inversedBy="acceticConfigs", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    protected $acceticConfigGroup;
    
    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set controlCode
     *
     * @param string $controlCode
     * @return AcceticConfig
     */
    public function setControlCode($controlCode)
    {
        $this->controlCode = $controlCode;

        return $this;
    }

    /**
     * Get controlCode
     *
     * @return string 
     */
    public function getControlCode()
    {
        return $this->controlCode;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return AcceticConfig
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return AcceticConfig
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
     * Set description
     *
     * @param string $description
     * @return AcceticConfig
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * @return AcceticConfig
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
     * Set acceticConfigGroup
     *
     * @param \Morus\AcceticBundle\Model\AcceticConfigGroupInterface $acceticConfigGroup
     * @return AcceticConfig
     */
    public function setAcceticConfigGroup(\Morus\AcceticBundle\Model\AcceticConfigGroupInterface $acceticConfigGroup = null)
    {
        $this->acceticConfigGroup = $acceticConfigGroup;

        return $this;
    }

    /**
     * Get acceticConfigGroup
     *
     * @return \Morus\AcceticBundle\Model\AcceticConfigGroupInterface 
     */
    public function getAcceticConfigGroup()
    {
        return $this->acceticConfigGroup;
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
    
    /*
     * Dummy Function - Set Config Control Code
     */
    public function setConfigControlCode($configControlCode)
    {

    }

    /*
     * Get Config Control Code
     */
    public function getConfigControlCode()
    {
        return $this->controlCode;
    }
}
