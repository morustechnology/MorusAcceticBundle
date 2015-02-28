<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * C
 */
interface CInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();
    
    /**
     * Set p
     *
     * @param \Morus\AcceticBundle\Model\PInterface $p
     * @return CInterface
     */
    public function setP(\Morus\AcceticBundle\Model\PInterface $p = null);

    /**
     * Get p
     *
     * @return \Morus\AcceticBundle\Model\PInterface 
     */
    public function getP();
    
}
