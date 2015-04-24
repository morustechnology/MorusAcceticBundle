<?php

namespace Morus\AcceticBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Doctrine\ORM\EntityManager as BaseEntityManager;

/**
 * Description of EntityManager
 *
 * @author Michael
 */
class EntityManager extends BaseEntityManager 
{
    protected $objectManager;
    protected $container;
    protected $acceticConfigGroupRepos, $acceticConfigRepos, $arRepos, $apRepos, $contactRepos, $contactClassRepos, $invoiceRepos, $invoiceClassRepos;
    protected $locationRepos, $locationClassRepos, $productRepos, $personRepos, $transactionRepos, $unitRepos, $unitClassRepos;
    protected $acceticConfigGroupClass, $acceticConfigClass, $arClass, $apClass, $contactClass, $contactClassClass, $invoiceClass, $invoiceClassClass;
    protected $locationClass, $locationClassClass, $productClass, $personClass, $transactionClass, $unitClass, $unitClassClass;
    
    public function __construct(ObjectManager $om, Container $container)
    {
        $this->objectManager = $om;
        $this->container = $container;
        
        // Get Entities class config
        $acceticConfigGroupParam    = $this->container->getParameter('morus_accetic.model.accetic_config_group');
        $acceticConfigParam         = $this->container->getParameter('morus_accetic.model.accetic_config');
        $apParam                    = $this->container->getParameter('morus_accetic.model.ap');
        $arParam                    = $this->container->getParameter('morus_accetic.model.ar');
        $contactParam               = $this->container->getParameter('morus_accetic.model.contact');
        $contactClassParam          = $this->container->getParameter('morus_accetic.model.contact_class');
        $invoiceParam               = $this->container->getParameter('morus_accetic.model.invoice');
        $invoiceNoteParam           = $this->container->getParameter('morus_accetic.model.invoice_note');
        $locationParam              = $this->container->getParameter('morus_accetic.model.location');
        $locationClassParam         = $this->container->getParameter('morus_accetic.model.location_class');
        $productParam               = $this->container->getParameter('morus_accetic.model.product');
        $personParam                = $this->container->getParameter('morus_accetic.model.person');
        $transactionParam           = $this->container->getParameter('morus_accetic.model.transaction');
        $unitParam                  = $this->container->getParameter('morus_accetic.model.unit');
        $unitClassParam             = $this->container->getParameter('morus_accetic.model.unit_class');
        
        // Get Class Metadata from Entity Manager
        $acceticConfigGroupMetadata     = $om->getClassMetadata($acceticConfigGroupParam);
        $acceticConfigMetadata          = $om->getClassMetadata($acceticConfigParam);
        $apMetadata                     = $om->getClassMetadata($apParam);
        $arMetadata                     = $om->getClassMetadata($arParam);
        $contactMetadata                = $om->getClassMetadata($contactParam);
        $contactClassMetadata           = $om->getClassMetadata($contactClassParam);
        $invoiceMetadata                = $om->getClassMetadata($invoiceParam);
        $invoiceNoteMetadata            = $om->getClassMetadata($invoiceNoteParam);
        $locationMetadata               = $om->getClassMetadata($locationParam);
        $locationClassMetadata          = $om->getClassMetadata($locationClassParam);
        $productMetadata                = $om->getClassMetadata($productParam);
        $personMetadata                 = $om->getClassMetadata($personParam);
        $transactionMetadata            = $om->getClassMetadata($transactionParam);
        $unitMetadata                   = $om->getClassMetadata($unitParam);
        $unitClassMetadata              = $om->getClassMetadata($unitClassParam);
        
                
        //  Get Entity Repositories
        $this->acceticConfigGroupRepos  = $om->getRepository($acceticConfigGroupParam);
        $this->acceticConfigRepos       = $om->getRepository($acceticConfigParam);
        $this->apRepos                  = $om->getRepository($apParam);
        $this->arRepos                  = $om->getRepository($arParam);
        $this->contactRepos             = $om->getRepository($contactParam);
        $this->contactClassRepos        = $om->getRepository($contactClassParam);
        $this->invoiceRepos             = $om->getRepository($invoiceParam);
        $this->invoiceNoteRepos         = $om->getRepository($invoiceNoteParam);
        $this->locationRepos            = $om->getRepository($locationParam);
        $this->locationClassRepos       = $om->getRepository($locationClassParam);
        $this->productRepos             = $om->getRepository($productParam);
        $this->personRepos              = $om->getRepository($personParam);
        $this->transactionRepos         = $om->getRepository($transactionParam);
        $this->unitRepos                = $om->getRepository($unitParam);
        $this->unitClassRepos           = $om->getRepository($unitClassParam);
        
        // Get Class Name     
        $this->acceticConfigGroupClass  = $acceticConfigGroupMetadata->getName();
        $this->acceticConfigClass       = $acceticConfigMetadata->getName();
        $this->apClass                  = $apMetadata->getName();
        $this->arClass                  = $arMetadata->getName();
        $this->contactClass             = $contactMetadata->getName();
        $this->contactClassClass        = $contactClassMetadata->getName();
        $this->invoiceClass             = $invoiceMetadata->getName();
        $this->invoiceNoteClass         = $invoiceNoteMetadata->getName();
        $this->locationClass            = $locationMetadata->getName();
        $this->locationClassClass       = $locationClassMetadata->getName();
        $this->productClass             = $productMetadata->getName();
        $this->personClass              = $personMetadata->getName();
        $this->transactionClass         = $transactionMetadata->getName();
        $this->unitClass                = $unitMetadata->getName();
        $this->unitClassClass           = $unitClassMetadata->getName();
        
    }
    
    /**
     * 
     * @return string
     * 
     * get next full invoice number (e.g. INV-00001)
     */
    public function nextInvNum() {
        $invPrefix = $this->acceticConfigRepos->findOneByControlCode('INV_PREFIX');
        $invNextNumber = $this->acceticConfigRepos->findOneByControlCode('INV_NEXT_NUM');
        
        if ($invPrefix && $invNextNumber) {
            $nextInvoiceNumber = $invPrefix->getValue() . $invNextNumber->getValue();
        }
        
        return $nextInvoiceNumber;
    }
    
    /**
     * 
     * @param type $invoiceNumber
     * @return type
     * 
     * Get full invoice and extract suffix (e.g. 00001)
     */
    public function getInvSuff($invoiceNumber) {
        $invPrefix = $this->acceticConfigRepos
                ->findOneByControlCode('INV_PREFIX')
                ->getValue();
        
        if (substr($invoiceNumber, 0, strlen($invPrefix)) == $invPrefix) {
            $suff = substr($invoiceNumber, strlen($invPrefix));
        } 
        
        return $suff ? $suff : null;
    }
    
    /**
     * 
     * @param type $suff
     * @param type $int
     * @return type
     * 
     * Get invoice suffix ( e.g. 00001) and return by $int increment (e.g. 00002)
     */
    public function incInvSuff($suff, $int){
        $len = strlen($suff);
        $num = intval($suff);
        $num = $num + $int;
        return str_pad($num, $len, '0', STR_PAD_LEFT);
    }
    
    /**
     * 
     * @param type $invnumber
     * @param type $int
     * @return type
     * 
     * Get full invoice number (e.g. INV-00001) and return by $int increment (e.g. INV-00002)
     */
    public function incInvNum($invnumber, $int){
        $invPrefix = $this->acceticConfigRepos->findOneByControlCode('INV_PREFIX');
        $suff = $this->getInvSuff($invnumber);
        $suff = $this->incInvSuff($suff, $int);
        
        return $invPrefix->getValue() . $suff;
    }
    
    /**
     * Returns a product instance
     *
     * @return ProductInterface
     */
    public function createProduct()
    {
        $pc = $this->productClass;
        
        $product = new $pc;
        
        return $product;
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
        $unitClass = $this->unitClassRepos->findOneByControlCode($controlCode);
        if ($unitClass) {
            $unit->addUnitClass($unitClass);
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
     * Returns an empty transaction instance with ar attached
     *
     * @return TransactionInterface
     */
    public function createAr()
    {
        $tc = $this->transactionClass;
        $arc = $this->arClass;
        $ic = $this->invoiceClass;
        
        $transaction = new $tc;
        $ar = new $arc;
        $invoiceLine1 = new $ic;
        $invoiceLine2 = new $ic;
        $invoiceLine3 = new $ic;
        $invoiceLine4 = new $ic;
        
        // Get statement process
        $ar->setInvnumber($this->nextInvNum());
        $ar->setTransaction($transaction);
        $transaction->setAr($ar);
        $transaction->addInvoice($invoiceLine1);
        $invoiceLine1->setTransaction($transaction);
        $transaction->addInvoice($invoiceLine2);
        $invoiceLine2->setTransaction($transaction);
        $transaction->addInvoice($invoiceLine3);
        $invoiceLine3->setTransaction($transaction);
        $transaction->addInvoice($invoiceLine4);
        $invoiceLine4->setTransaction($transaction);
        
        return $ar;
    }
    
    /**
     * Returns an accetic config group repository
     *
     * @return AcceticConfigGroupRepository
     */
    public function getAcceticConfigGroupRepository()
    {
        return $this->acceticConfigGroupRepos;
    }
    
    /**
     * Returns an accetic config repository
     *
     * @return AcceticConfigRepository
     */
    public function getAcceticConfigRepository()
    {
        return $this->acceticConfigRepos;
    }
    
    /**
     * Returns ap repository
     *
     * @return ApRepository
     */
    public function getApRepository()
    {
        return $this->apRepos;
    }
    
    /**
     * Returns ar repository
     *
     * @return ArRepository
     */
    public function getArRepository()
    {
        return $this->arRepos;
    }
    
    /**
     * Returns contact repository
     *
     * @return ContactRepository
     */
    public function getContactRepository()
    {
        return $this->contactRepos;
    }

    /**
     * Returns contact class repository
     *
     * @return ContactClassRepository
     */
    public function getContactClassRepository()
    {
        return $this->contactClassRepos;
    }
    
    /**
     * Returns invoice repository
     *
     * @return InvoiceRepository
     */
    public function getInvoiceRepository()
    {
        return $this->invoiceRepos;
    }
    
    /**
     * Returns invoice note repository
     *
     * @return InvoiceNoteRepository
     */
    public function getInvoiceNoteRepository()
    {
        return $this->invoiceNoteRepos;
    }
    
    /**
     * Returns location repository
     *
     * @return LocationRepository
     */
    public function getLocationRepository()
    {
        return $this->locationRepos;
    }
    
    /**
     * Returns location class repository
     *
     * @return LocationClassRepository
     */
    public function getLocationClassRepository()
    {
        return $this->locationClassRepos;
    }

    /**
     * Returns product repository
     *
     * @return ProductRepository
     */
    public function getProductRepository()
    {
        return $this->productRepos;
    }

    /**
     * Returns person repository
     *
     * @return PersonRepository
     */
    public function getPersonRepository()
    {
        return $this->personRepos;
    }
    
    /**
     * Returns transaction repository
     *
     * @return TransactionRepository
     */
    public function getTransactionRepository()
    {
        return $this->transactionRepos;
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
    
    /**
     * Returns unit class repository
     *
     * @return UnitClass Repository
     */
    public function getUnitClassRepository()
    {
        return $this->unitClassRepos;
    }
}
