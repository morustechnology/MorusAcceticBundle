<?php

namespace Morus\AcceticBundle\Model;

/**
 * Description of PartsInterface
 *
 * @author Michael
 */
interface PartsInterface {
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set itemcode
     *
     * @param string $itemcode
     * @return PartsInterface
     */
    public function setItemcode($itemcode);

    /**
     * Get itemcode
     *
     * @return string 
     */
    public function getItemcode();

    /**
     * Set itemname
     *
     * @param string $itemname
     * @return PartsInterface
     */
    public function setItemname($itemname);

    /**
     * Get itemname
     *
     * @return string 
     */
    public function getItemname();

    /**
     * Set unit
     *
     * @param string $unit
     * @return PartsInterface
     */
    public function setUnit($unit);

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit();

    /**
     * Set forSale
     *
     * @param boolean $forSale
     * @return PartsInterface
     */
    public function setForSale($forSale);

    /**
     * Get forSale
     *
     * @return boolean 
     */
    public function getForSale();

    /**
     * Set listprice
     *
     * @param string $listprice
     * @return PartsInterface
     */
    public function setListprice($listprice);

    /**
     * Get listprice
     *
     * @return string 
     */
    public function getListprice();

    /**
     * Set sellprice
     *
     * @param string $sellprice
     * @return PartsInterface
     */
    public function setSellprice($sellprice);

    /**
     * Get sellprice
     *
     * @return string 
     */
    public function getSellprice();

    /**
     * Set saleDescription
     *
     * @param string $saleDescription
     * @return PartsInterface
     */
    public function setSaleDescription($saleDescription);

    /**
     * Get saleDescription
     *
     * @return string 
     */
    public function getSaleDescription();

    /**
     * Set forPurchase
     *
     * @param boolean $forPurchase
     * @return PartsInterface
     */
    public function setForPurchase($forPurchase);

    /**
     * Get forPurchase
     *
     * @return boolean 
     */
    public function getForPurchase();

    /**
     * Set lastcost
     *
     * @param string $lastcost
     * @return PartsInterface
     */
    public function setLastcost($lastcost);

    /**
     * Get lastcost
     *
     * @return string 
     */
    public function getLastcost();

    /**
     * Set purchaseDescription
     *
     * @param string $purchaseDescription
     * @return PartsInterface
     */
    public function setPurchaseDescription($purchaseDescription);

    /**
     * Get purchaseDescription
     *
     * @return string 
     */
    public function getPurchaseDescription();

    /**
     * Set priceupdate
     *
     * @param \DateTime $priceupdate
     * @return PartsInterface
     */
    public function setPriceupdate($priceupdate);

    /**
     * Get priceupdate
     *
     * @return \DateTime 
     */
    public function getPriceupdate();

    /**
     * Set weight
     *
     * @param string $weight
     * @return PartsInterface
     */
    public function setWeight($weight);

    /**
     * Get weight
     *
     * @return string 
     */
    public function getWeight();

    /**
     * Set onhand
     *
     * @param string $onhand
     * @return PartsInterface
     */
    public function setOnhand($onhand);

    /**
     * Get onhand
     *
     * @return string 
     */
    public function getOnhand();

    /**
     * Set notes
     *
     * @param string $notes
     * @return PartsInterface
     */
    public function setNotes($notes);

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes();

    /**
     * Set makemodel
     *
     * @param boolean $makemodel
     * @return PartsInterface
     */
    public function setMakemodel($makemodel);

    /**
     * Get makemodel
     *
     * @return boolean 
     */
    public function getMakemodel();

    /**
     * Set assembly
     *
     * @param boolean $assembly
     * @return PartsInterface
     */
    public function setAssembly($assembly);

    /**
     * Get assembly
     *
     * @return boolean 
     */
    public function getAssembly();

    /**
     * Set alternate
     *
     * @param boolean $alternate
     * @return PartsInterface
     */
    public function setAlternate($alternate);

    /**
     * Get alternate
     *
     * @return boolean 
     */
    public function getAlternate();

    /**
     * Set rop
     *
     * @param string $rop
     * @return PartsInterface
     */
    public function setRop($rop);

    /**
     * Get rop
     *
     * @return string 
     */
    public function getRop();

    /**
     * Set bin
     *
     * @param string $bin
     * @return PartsInterface
     */
    public function setBin($bin);

    /**
     * Get bin
     *
     * @return string 
     */
    public function getBin();

    /**
     * Set obsolete
     *
     * @param boolean $obsolete
     * @return PartsInterface
     */
    public function setObsolete($obsolete);

    /**
     * Get obsolete
     *
     * @return boolean 
     */
    public function getObsolete();

    /**
     * Set bom
     *
     * @param boolean $bom
     * @return PartsInterface
     */
    public function setBom($bom);

    /**
     * Get bom
     *
     * @return boolean 
     */
    public function getBom();

    /**
     * Set image
     *
     * @param string $image
     * @return PartsInterface
     */
    public function setImage($image);

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage();

    /**
     * Set drawing
     *
     * @param string $drawing
     * @return PartsInterface
     */
    public function setDrawing($drawing);

    /**
     * Get drawing
     *
     * @return string 
     */
    public function getDrawing();

    /**
     * Set microfiche
     *
     * @param string $microfiche
     * @return PartsInterface
     */
    public function setMicrofiche($microfiche);

    /**
     * Get microfiche
     *
     * @return string 
     */
    public function getMicrofiche();

    /**
     * Set partsgroupId
     *
     * @param integer $partsgroupId
     * @return PartsInterface
     */
    public function setPartsgroupId($partsgroupId);

    /**
     * Get partsgroupId
     *
     * @return integer 
     */
    public function getPartsgroupId();

    /**
     * Set avgcost
     *
     * @param string $avgcost
     * @return PartsInterface
     */
    public function setAvgcost($avgcost);

    /**
     * Get avgcost
     *
     * @return string 
     */
    public function getAvgcost();
    
    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return PartsInterface
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
     * @return PartsInterface
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
     * @return PartsInterface
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
     * @return PartsInterface
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
     * @return PartsInterface
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
