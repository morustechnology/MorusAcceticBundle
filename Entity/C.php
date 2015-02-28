<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Morus\AcceticBundle\Model\CInterface;
use Morus\AcceticBundle\Model\PInterface;

/**
 * @ORM\MappedSuperclass
 */
class C implements CInterface {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Morus\AcceticBundle\Model\PInterface")
     */
    protected $p;
    
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
     * Set p
     *
     * @param \Morus\AcceticBundle\Model\PInterface $p
     * @return C
     */
    public function setP(PInterface $p = null)
    {
        $this->p = $p;

        return $this;
    }

    /**
     * Get p
     *
     * @return \Morus\AcceticBundle\Model\PInterface 
     */
    public function getP()
    {
        return $this->p;
    }
}
