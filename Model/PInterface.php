<?php

namespace Morus\AcceticBundle\Model;

interface PInterface {
    
    public function getId();
    
    public function setControlCode($controlCode);
    
    public function getControlCode();
    
    public function addC(\Morus\AcceticBundle\Model\CInterface $c);
    
    public function removeC(\Morus\AcceticBundle\Model\CInterface $c);
    
    public function getCs();
}
