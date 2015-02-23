<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 */
class P implements \Morus\AcceticBundle\Model\PInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $cs;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invoiceNotes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return Invoice
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
     * Add cs
     *
     * @param \Morus\AcceticBundle\Model\CInterface $cs
     * @return Invoice
     */
    public function addC(\Morus\AcceticBundle\Model\CInterface $c)
    {
        $this->cs[] = $c;

        return $this;
    }

    /**
     * Remove c
     *
     * @param \Morus\AcceticBundle\Model\CInterface $c
     */
    public function removeC(\Morus\AcceticBundle\Model\CInterface $c)
    {
        $this->cs->removeElement($c);
    }

    /**
     * Get cs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCs()
    {
        return $this->cs;
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
