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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
     * @return Parts
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
