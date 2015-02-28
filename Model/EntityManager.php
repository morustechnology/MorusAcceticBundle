<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Description of EntityManager
 *
 * @author Michael
 */
class EntityManager{
    protected $objectManager;
    protected $container;
    protected $acceticConfigRepos, $arRepos, $apRepos, $contactRepos, $contactClassRepos, $invoiceRepos, $invoiceClassRepos;
    protected $locationRepos, $locationClassRepos, $partsRepos, $personRepos, $transactionRepos, $unitRepos, $unitClassRepos;
    protected $acceticConfigClass, $arClass, $apClass, $contactClass, $contactClassClass, $invoiceClass, $invoiceClassClass;
    protected $locationClass, $locationClassClass, $partsClass, $personClass, $transactionClass, $unitClass, $unitClassClass;
    protected $pRepos, $pClass, $cRepos, $cClass;
    
    
    public function __construct(ObjectManager $om, Container $container)
    {
        $this->objectManager = $om;
        $this->container = $container;
        
        // Get Entities class config
        $acceticConfigParam  = $this->container->getParameter('morus_accetic.model.accetic_config');
        $apParam             = $this->container->getParameter('morus_accetic.model.ap');
        $arParam             = $this->container->getParameter('morus_accetic.model.ar');
        $contactParam        = $this->container->getParameter('morus_accetic.model.contact');
        $contactClassParam   = $this->container->getParameter('morus_accetic.model.contact_class');
        $invoiceParam        = $this->container->getParameter('morus_accetic.model.invoice');
        $invoiceNoteParam    = $this->container->getParameter('morus_accetic.model.invoice_note');
        $locationParam       = $this->container->getParameter('morus_accetic.model.location');
        $locationClassParam  = $this->container->getParameter('morus_accetic.model.location_class');
        $partsParam          = $this->container->getParameter('morus_accetic.model.parts');
        $personParam         = $this->container->getParameter('morus_accetic.model.person');
        $transactionParam    = $this->container->getParameter('morus_accetic.model.transaction');
        $unitParam           = $this->container->getParameter('morus_accetic.model.unit');
        $unitClassParam      = $this->container->getParameter('morus_accetic.model.unit_class');
        
        // Get Class Metadata from Entity Manager
        $acceticConfigMetadata  = $om->getClassMetadata($acceticConfigParam);
        $apMetadata             = $om->getClassMetadata($apParam);
        $arMetadata             = $om->getClassMetadata($arParam);
        $contactMetadata        = $om->getClassMetadata($contactParam);
        $contactClassMetadata   = $om->getClassMetadata($contactClassParam);
        $invoiceMetadata        = $om->getClassMetadata($invoiceParam);
        $invoiceNoteMetadata    = $om->getClassMetadata($invoiceNoteParam);
        $locationMetadata       = $om->getClassMetadata($locationParam);
        $locationClassMetadata  = $om->getClassMetadata($locationClassParam);
        $partsMetadata          = $om->getClassMetadata($partsParam);
        $personMetadata         = $om->getClassMetadata($personParam);
        $transactionMetadata    = $om->getClassMetadata($transactionParam);
        $unitMetadata           = $om->getClassMetadata($unitParam);
        $unitClassMetadata      = $om->getClassMetadata($unitClassParam);
        
                
        //  Get Entity Repositories
        $this->acceticConfigRepos  = $om->getRepository($acceticConfigParam);
        $this->apRepos             = $om->getRepository($apParam);
        $this->arRepos             = $om->getRepository($arParam);
        $this->contactRepos        = $om->getRepository($contactParam);
        $this->contactClassRepos   = $om->getRepository($contactClassParam);
        $this->invoiceRepos        = $om->getRepository($invoiceParam);
        $this->invoiceNoteRepos    = $om->getRepository($invoiceNoteParam);
        $this->locationRepos       = $om->getRepository($locationParam);
        $this->locationClassRepos  = $om->getRepository($locationClassParam);
        $this->partsRepos          = $om->getRepository($partsParam);
        $this->personRepos         = $om->getRepository($personParam);
        $this->transactionRepos    = $om->getRepository($transactionParam);
        $this->unitRepos           = $om->getRepository($unitParam);
        $this->unitClassRepos      = $om->getRepository($unitClassParam);
        
        // Get Class Name        
        $this->acceticConfigClass  = $acceticConfigMetadata->getName();
        $this->apClass             = $apMetadata->getName();
        $this->arClass             = $arMetadata->getName();
        $this->contactClass        = $contactMetadata->getName();
        $this->contactClassClass   = $contactClassMetadata->getName();
        $this->invoiceClass        = $invoiceMetadata->getName();
        $this->invoiceNoteClass    = $invoiceNoteMetadata->getName();
        $this->locationClass       = $locationMetadata->getName();
        $this->locationClassClass  = $locationClassMetadata->getName();
        $this->partsClass          = $partsMetadata->getName();
        $this->personClass         = $personMetadata->getName();
        $this->transactionClass    = $transactionMetadata->getName();
        $this->unitClass           = $unitMetadata->getName();
        $this->unitClassClass      = $unitClassMetadata->getName();
        
        
        $cMetadata = $om->getClassMetadata('Morus\FasBundle\Entity\C');
        $this->cRepos = $om->getRepository('Morus\FasBundle\Entity\C');
        $this->cClass = $cMetadata->getName();
        
        $pMetadata = $om->getClassMetadata('Morus\FasBundle\Entity\P');
        $this->pRepos = $om->getRepository('Morus\FasBundle\Entity\P');
        $this->pClass = $pMetadata->getName();
    }
    
    /**
     * Returns an empty unit instance
     *
     * @return UnitInterface
     */
    public function createUnit($ecc = null)
    {
        $controlCode = strtoupper($ecc);

        $uc = $this->unitClass;
        $pc = $this->personClass;
        $cc = $this->contactClass;
        $lc = $this->locationClass;
        
        $unit = new $uc;
        $person = new $pc;
        $email = new $cc;
        $postalLocation = new $lc;
        $physicalLocation = new $lc;
        $telephoneContact = new $cc;
        $faxContact = new $cc;
        $mobileContact = new $cc;
        $directContact = new $cc;
        $websiteContact = new $cc;
        
        $unit->setActive(true);
        $unit->setCreateDate(new \DateTime("now"));
        
        $person->setIsPrimary(true);
        
        // Add Contact Type
        if ($ecc && !$ecc == 'ALL') {
            $unit->addUnitClass($this->unitClassRepos->findOneByControlCode($ecc));
        }
        
        //Add Default Contact Person
        $email->setContactClass($this->contactClassRepos->findOneByControlCode('EMAIL'));
        
        $email->setPerson($person);
        $person->addContact($email);
        $unit->addPerson($person);
        $person->setUnit($unit);

        // Create Default Postal Address
        $postalLocation->setLocationClass($this->locationClassRepos->findOneByControlCode('POSTAL'));
        
        $unit->addLocation($postalLocation);
        $postalLocation->setUnit($unit);
        
        // Create Default Physical Address
        ;
        $physicalLocation->setLocationClass($this->locationClassRepos->findOneByControlCode('PHYSICAL'));
        $unit->getLocations()->add($physicalLocation);
        $physicalLocation->setUnit($unit);
        
        //  Add default contacts, e.g. telephone, fax, website
        $telephoneContact->setContactClass($this->contactClassRepos->findOneByControlCode('TELEPHONE'));
        $unit->addContact($telephoneContact);
        $telephoneContact->setUnit($unit);
        
        $faxContact->setContactClass($this->contactClassRepos->findOneByControlCode('FAX'));
        $unit->addContact($faxContact);
        $faxContact->setUnit($unit);
        
        $mobileContact->setContactClass($this->contactClassRepos->findOneByControlCode('MOBILE'));
        $unit->addContact($mobileContact);
        $mobileContact->setUnit($unit);
        
        $directContact->setContactClass($this->contactClassRepos->findOneByControlCode('DIRECT'));
        $unit->addContact($directContact);
        $directContact->setUnit($unit);
        
        $websiteContact->setContactClass($this->contactClassRepos->findOneByControlCode('WEBSITE'));
        $unit->addContact($websiteContact);
        $websiteContact->setUnit($unit);

        return $unit;
    }
    
    /**
     * Returns an unit repository
     *
     * @return UnitRepository
     */
    public function getUnitRepository()
    {
        return $this->unitRepos;
    }
    
    public function createP()
    {
        $pc = $this->pClass;
        $p = new $pc;
        
        return $p;
    }
    
    public function getPRepository()
    {
        return $this->pRepos;
    }
    
    public function createC()
    {
        $cc = $this->cClass;
        $c = new $cc;
        
        return $c;
    }
    
    public function getCRepository()
    {
        return $this->cRepos;
    }
}
