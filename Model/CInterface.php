<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceNote
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
     * Set note
     *
     * @param string $note
     * @return C
     */
    public function setNote($note);

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote();
    
    /**
     * Set p
     *
     * @param \Morus\AcceticBundle\Model\PInterface $p
     * @return C
     */
    public function setP(\Morus\AcceticBundle\Model\PInterface $p = null);

    /**
     * Get p
     *
     * @return \Morus\AcceticBundle\Model\PInterface 
     */
    public function getP();
    
    /**
     * @ORM\PrePersist
     */
    public function onPrePersist();

    /**
     * @ORM\PostPersist
     */
    public function onPostPersist();
}
