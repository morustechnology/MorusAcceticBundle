<?php

namespace Morus\AcceticBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * C
 */
class C implements \Morus\AcceticBundle\Model\CInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $note;

    /**
     * @var \Morus\AcceticBundle\Model\PInterface
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
     * Set note
     *
     * @param string $note
     * @return C
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }
    
    /**
     * Set p
     *
     * @param \Morus\AcceticBundle\Model\PInterface $p
     * @return C
     */
    public function setP(\Morus\AcceticBundle\Model\PInterface $p = null)
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
