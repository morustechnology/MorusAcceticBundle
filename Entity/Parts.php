<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parts
 *
 * @ORM\Table(name="accetic_parts", uniqueConstraints={@ORM\UniqueConstraint(name="parts_itemcode_index_u", columns={"itemcode"})})
 * @ORM\MappedSuperclass(repositoryClass="Morus\AcceticBundle\Entity\Repository\PartsRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Parts implements \Morus\AcceticBundle\Model\PartsInterface
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
     * @ORM\Column(name="itemcode", type="string", length=100, nullable=false)
     */
    private $itemcode;

    /**
     * @var string
     *
     * @ORM\Column(name="itemname", type="string", length=200, nullable=false)
     */
    private $itemname;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=100, nullable=true)
     */
    private $unit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="forsale", type="boolean", nullable=true)
     */
    private $forsale;

    /**
     * @var string
     *
     * @ORM\Column(name="listprice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $listprice;

    /**
     * @var string
     *
     * @ORM\Column(name="sellprice", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $sellprice;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_description", type="text", nullable=true)
     */
    private $saleDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="forpurchase", type="boolean", nullable=true)
     */
    private $forpurchase;

    /**
     * @var string
     *
     * @ORM\Column(name="lastcost", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $lastcost;

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_description", type="text", nullable=true)
     */
    private $purchaseDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="priceupdate", type="date", nullable=true)
     */
    private $priceupdate;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="onhand", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $onhand;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="makemodel", type="boolean", nullable=true)
     */
    private $makemodel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="assembly", type="boolean", nullable=true)
     */
    private $assembly;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alternate", type="boolean", nullable=true)
     */
    private $alternate;

    /**
     * @var string
     *
     * @ORM\Column(name="rop", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $rop;

    /**
     * @var string
     *
     * @ORM\Column(name="bin", type="text", nullable=true)
     */
    private $bin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obsolete", type="boolean", nullable=true)
     */
    private $obsolete;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bom", type="boolean", nullable=true)
     */
    private $bom;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="drawing", type="text", nullable=true)
     */
    private $drawing;

    /**
     * @var string
     *
     * @ORM\Column(name="microfiche", type="text", nullable=true)
     */
    private $microfiche;

    /**
     * @var integer
     *
     * @ORM\Column(name="partsgroup_id", type="integer", nullable=true)
     */
    private $partsgroupId;

    /**
     * @var string
     *
     * @ORM\Column(name="avgcost", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $avgcost;

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
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\InvoiceInterface", mappedBy="parts", orphanRemoval=true)
     */
    protected $invoices;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoices = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set itemcode
     *
     * @param string $itemcode
     * @return Parts
     */
    public function setItemcode($itemcode)
    {
        $this->itemcode = $itemcode;

        return $this;
    }

    /**
     * Get itemcode
     *
     * @return string 
     */
    public function getItemcode()
    {
        return $this->itemcode;
    }

    /**
     * Set itemname
     *
     * @param string $itemname
     * @return Parts
     */
    public function setItemname($itemname)
    {
        $this->itemname = $itemname;

        return $this;
    }

    /**
     * Get itemname
     *
     * @return string 
     */
    public function getItemname()
    {
        return $this->itemname;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return Parts
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set forsale
     *
     * @param boolean $forsale
     * @return Parts
     */
    public function setForsale($forsale)
    {
        $this->forsale = $forsale;

        return $this;
    }

    /**
     * Get forsale
     *
     * @return boolean 
     */
    public function getForsale()
    {
        return $this->forsale;
    }

    /**
     * Set listprice
     *
     * @param string $listprice
     * @return Parts
     */
    public function setListprice($listprice)
    {
        $this->listprice = $listprice;

        return $this;
    }

    /**
     * Get listprice
     *
     * @return string 
     */
    public function getListprice()
    {
        return $this->listprice;
    }

    /**
     * Set sellprice
     *
     * @param string $sellprice
     * @return Parts
     */
    public function setSellprice($sellprice)
    {
        $this->sellprice = $sellprice;

        return $this;
    }

    /**
     * Get sellprice
     *
     * @return string 
     */
    public function getSellprice()
    {
        return $this->sellprice;
    }

    /**
     * Set saleDescription
     *
     * @param string $saleDescription
     * @return Parts
     */
    public function setSaleDescription($saleDescription)
    {
        $this->saleDescription = $saleDescription;

        return $this;
    }

    /**
     * Get saleDescription
     *
     * @return string 
     */
    public function getSaleDescription()
    {
        return $this->saleDescription;
    }

    /**
     * Set forpurchase
     *
     * @param boolean $forpurchase
     * @return Parts
     */
    public function setForpurchase($forpurchase)
    {
        $this->forpurchase = $forpurchase;

        return $this;
    }

    /**
     * Get forpurchase
     *
     * @return boolean 
     */
    public function getForpurchase()
    {
        return $this->forpurchase;
    }

    /**
     * Set lastcost
     *
     * @param string $lastcost
     * @return Parts
     */
    public function setLastcost($lastcost)
    {
        $this->lastcost = $lastcost;

        return $this;
    }

    /**
     * Get lastcost
     *
     * @return string 
     */
    public function getLastcost()
    {
        return $this->lastcost;
    }

    /**
     * Set purchaseDescription
     *
     * @param string $purchaseDescription
     * @return Parts
     */
    public function setPurchaseDescription($purchaseDescription)
    {
        $this->purchaseDescription = $purchaseDescription;

        return $this;
    }

    /**
     * Get purchaseDescription
     *
     * @return string 
     */
    public function getPurchaseDescription()
    {
        return $this->purchaseDescription;
    }

    /**
     * Set priceupdate
     *
     * @param \DateTime $priceupdate
     * @return Parts
     */
    public function setPriceupdate($priceupdate)
    {
        $this->priceupdate = $priceupdate;

        return $this;
    }

    /**
     * Get priceupdate
     *
     * @return \DateTime 
     */
    public function getPriceupdate()
    {
        return $this->priceupdate;
    }

    /**
     * Set weight
     *
     * @param string $weight
     * @return Parts
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set onhand
     *
     * @param string $onhand
     * @return Parts
     */
    public function setOnhand($onhand)
    {
        $this->onhand = $onhand;

        return $this;
    }

    /**
     * Get onhand
     *
     * @return string 
     */
    public function getOnhand()
    {
        return $this->onhand;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Parts
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set makemodel
     *
     * @param boolean $makemodel
     * @return Parts
     */
    public function setMakemodel($makemodel)
    {
        $this->makemodel = $makemodel;

        return $this;
    }

    /**
     * Get makemodel
     *
     * @return boolean 
     */
    public function getMakemodel()
    {
        return $this->makemodel;
    }

    /**
     * Set assembly
     *
     * @param boolean $assembly
     * @return Parts
     */
    public function setAssembly($assembly)
    {
        $this->assembly = $assembly;

        return $this;
    }

    /**
     * Get assembly
     *
     * @return boolean 
     */
    public function getAssembly()
    {
        return $this->assembly;
    }

    /**
     * Set alternate
     *
     * @param boolean $alternate
     * @return Parts
     */
    public function setAlternate($alternate)
    {
        $this->alternate = $alternate;

        return $this;
    }

    /**
     * Get alternate
     *
     * @return boolean 
     */
    public function getAlternate()
    {
        return $this->alternate;
    }

    /**
     * Set rop
     *
     * @param string $rop
     * @return Parts
     */
    public function setRop($rop)
    {
        $this->rop = $rop;

        return $this;
    }

    /**
     * Get rop
     *
     * @return string 
     */
    public function getRop()
    {
        return $this->rop;
    }

    /**
     * Set bin
     *
     * @param string $bin
     * @return Parts
     */
    public function setBin($bin)
    {
        $this->bin = $bin;

        return $this;
    }

    /**
     * Get bin
     *
     * @return string 
     */
    public function getBin()
    {
        return $this->bin;
    }

    /**
     * Set obsolete
     *
     * @param boolean $obsolete
     * @return Parts
     */
    public function setObsolete($obsolete)
    {
        $this->obsolete = $obsolete;

        return $this;
    }

    /**
     * Get obsolete
     *
     * @return boolean 
     */
    public function getObsolete()
    {
        return $this->obsolete;
    }

    /**
     * Set bom
     *
     * @param boolean $bom
     * @return Parts
     */
    public function setBom($bom)
    {
        $this->bom = $bom;

        return $this;
    }

    /**
     * Get bom
     *
     * @return boolean 
     */
    public function getBom()
    {
        return $this->bom;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Parts
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set drawing
     *
     * @param string $drawing
     * @return Parts
     */
    public function setDrawing($drawing)
    {
        $this->drawing = $drawing;

        return $this;
    }

    /**
     * Get drawing
     *
     * @return string 
     */
    public function getDrawing()
    {
        return $this->drawing;
    }

    /**
     * Set microfiche
     *
     * @param string $microfiche
     * @return Parts
     */
    public function setMicrofiche($microfiche)
    {
        $this->microfiche = $microfiche;

        return $this;
    }

    /**
     * Get microfiche
     *
     * @return string 
     */
    public function getMicrofiche()
    {
        return $this->microfiche;
    }

    /**
     * Set partsgroupId
     *
     * @param integer $partsgroupId
     * @return Parts
     */
    public function setPartsgroupId($partsgroupId)
    {
        $this->partsgroupId = $partsgroupId;

        return $this;
    }

    /**
     * Get partsgroupId
     *
     * @return integer 
     */
    public function getPartsgroupId()
    {
        return $this->partsgroupId;
    }

    /**
     * Set avgcost
     *
     * @param string $avgcost
     * @return Parts
     */
    public function setAvgcost($avgcost)
    {
        $this->avgcost = $avgcost;

        return $this;
    }

    /**
     * Get avgcost
     *
     * @return string 
     */
    public function getAvgcost()
    {
        return $this->avgcost;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * Add invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     * @return Parts
     */
    public function addInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices)
    {
        $this->invoices[] = $invoices;

        return $this;
    }

    /**
     * Remove invoices
     *
     * @param \Morus\AcceticBundle\Model\InvoiceInterface $invoices
     */
    public function removeInvoice(\Morus\AcceticBundle\Model\InvoiceInterface $invoices)
    {
        $this->invoices->removeElement($invoices);
    }

    /**
     * Get invoices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}
