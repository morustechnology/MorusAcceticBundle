<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Morus\AcceticBundle\Model\PInterface;

/**
 * @ORM\MappedSuperclass
 */
class P implements PInterface {
    
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
    private $controlCode;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Morus\AcceticBundle\Model\CInterface", mappedBy="p", cascade={"persist","remove"}, orphanRemoval=true)
     */
    protected $cs;
    
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
     * @return P
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
     * Add c
     *
     * @param \Morus\AcceticBundle\Model\CInterface $c
     * @return P
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
}
