<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 */
interface PInterface
{
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set description
     *
     * @param string $description
     * @return InvoiceInterface
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription();

    /**
     * Add c
     *
     * @param \Morus\AcceticBundle\Model\CInterface $c
     * @return CInterface
     */
    public function addC(\Morus\AcceticBundle\Model\CInterface $c);

    /**
     * Remove c
     *
     * @param \Morus\AcceticBundle\Model\CInterface $c
     */
    public function removeC(\Morus\AcceticBundle\Model\CInterface $c);

    /**
     * Get cs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCs();

}
