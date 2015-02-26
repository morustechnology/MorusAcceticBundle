<?php

namespace Morus\AcceticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Morus\AcceticBundle\Entity\Contact;
use Morus\AcceticBundle\Entity\Unit;
use Morus\AcceticBundle\Form\Type\UnitType;
use Morus\AcceticBundle\Entity\Location;
use Morus\AcceticBundle\Entity\Person;


/**
 * Contact controller.
 *
 */
class ContactsController extends Controller
{
    /**
     * Contacts Main Page.
     *
     */
    public function indexAction(Request $request)
    {

        return $this->render('MorusAcceticBundle:Contacts:index.html.twig');
    }
    
    /**
     * Lists Unit entities.
     *
     */
    public function listAjaxAction($ecc)
    {
        $bundle = $this->container->getParameter('morus_accetic.bundle');
        $controlCode = strtoupper($ecc);
        $em = $this->getDoctrine()->getManager();
        
        $qb = $em->createQueryBuilder()
                ->select('u.id, u.name')
                ->addSelect('p.firstName, p.lastName')
                ->addSelect('c.description')
                ->from($bundle.':Unit', 'u')
                
                ->join('u.persons', 'p', 'WITH', 'p.isPrimary = 1')
                ->join('p.contacts', 'c')
                ->where('u.active = 1')
                ->orderBy('u.name', 'ASC');

        if ($controlCode == 'ALL') {
            $qb->leftJoin('u.unitClasses', 'uc');
        } else {
            $qb->join('u.unitClasses', 'uc', 'WITH', 'uc.controlCode = :ecc')
            ->setParameter('ecc', $ecc);
                    
        }
        
        $contacts = $qb->getQuery()->getResult();
        
        return $this->render('MorusAcceticBundle:Contacts:list.html.twig', array(
            'contacts' => $contacts,
        ));
    }
    
    /**
     * Displays a form to create a new Entity unit.
     *
     */
    public function newAction($ecc)
    {        
        
        $entity = $this->createUnit($ecc);
        $form = $this->genCreateForm($entity, $ecc);

        return $this->render('MorusAcceticBundle:Contacts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Unit entity.
     *
     */
    public function createAction(Request $request, $ecc)
    {
        
        
        //$entity = $this->createUnit($ecc);
        
        
        
        
        $bundle = $this->container->getParameter('morus_accetic.bundle');
        $controlCode = strtoupper($ecc);
        
        $unit = new Unit();
        $person = new Person();
        $email = new Contact();
        $postalLocation = new Location();
        $physicalLocation = new Location();
        $telephoneContact = new Contact();
        $faxContact = new Contact();
        $mobileContact = new Contact();
        $directContact = new Contact();
        $websiteContact = new Contact();
        
        $unit->setActive(true);
        $unit->setCreateDate(new \DateTime("now"));
        
        $person->setIsPrimary(true);
        
        // Add Contact Type
        if ($ecc) {
           $unitClass = $this->getDoctrine()
                ->getRepository($bundle.':UnitClass')
                ->findOneByControlCode($ecc);
           if ($unitClass) {
               $unit->addUnitClass($unitClass);
           }
        }
        
        //Add Default Contact Person
        $contactClass = $this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('EMAIL');
        $email->setContactClass($contactClass);
        
        $email->setPerson($person);
        $person->addContact($email);
        $unit->addPerson($person);
        $person->setUnit($unit);

        // Create Default Postal Address
        $postalLocationClass = $this->getDoctrine()
                ->getRepository($bundle.':LocationClass')
                ->findOneByControlCode('POSTAL');
        $postalLocation->setLocationClass($postalLocationClass);
        
        $unit->addLocation($postalLocation);
        $postalLocation->setUnit($unit);
        
        // Create Default Physical Address
        $physicalLocationClass = $this->getDoctrine()
                ->getRepository($bundle.':LocationClass')
                ->findOneByControlCode('PHYSICAL');
        $physicalLocation->setLocationClass($physicalLocationClass);
        $unit->getLocations()->add($physicalLocation);
        $physicalLocation->setUnit($unit);
        
        //  Add default contacts, e.g. telephone, fax, website
        $telephoneContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('TELEPHONE'));
        $unit->addContact($telephoneContact);
        $telephoneContact->setUnit($unit);
        
        $faxContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('FAX'));
        $unit->addContact($faxContact);
        $faxContact->setUnit($unit);
        
        $mobileContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('MOBILE'));
        $unit->addContact($mobileContact);
        $mobileContact->setUnit($unit);
        
        $directContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('DIRECT'));
        $unit->addContact($directContact);
        $directContact->setUnit($unit);
        
        $websiteContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('WEBSITE'));
        $unit->addContact($websiteContact);
        $websiteContact->setUnit($unit);
        
        
        
        
        
        
        $form = $this->genCreateForm($unit, $ecc);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist();
            $em->persist($person);
            $em->persist($email);
            $em->persist($postalLocation);
            $em->persist($physicalLocation);
            $em->persist($telephoneContact);
            $em->persist($faxContact);
            $em->persist($mobileContact);
            $em->persist($directContact);
            $em->persist($websiteContact);
            $em->persist($unit);
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_contacts'));
        }

        return $this->render('MorusAcceticBundle:Contacts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Creates a form to create a Entity unit.
     *
     * @param Unit $unit The unit
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function genCreateForm(Unit $unit, $ecc = null)
    {
        $form = $this->createForm('accetic_unit', $unit, array(
            'action' => $this->generateUrl('morus_accetic_contacts_create', array('ecc' => $ecc)),
            'method' => 'POST',
        ));
        
        $form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('contact.btn.save'),
                'attr' => array('class' => 'green-btn')
                ));

        return $form;
    }

    private function createUnit($ecc = null)
    {
        $bundle = $this->container->getParameter('morus_accetic.bundle');
        $controlCode = strtoupper($ecc);
        
        $unit = new Unit();
        $person = new Person();
        $email = new Contact();
        $postalLocation = new Location();
        $physicalLocation = new Location();
        $telephoneContact = new Contact();
        $faxContact = new Contact();
        $mobileContact = new Contact();
        $directContact = new Contact();
        $websiteContact = new Contact();
        
        $unit->setActive(true);
        $unit->setCreateDate(new \DateTime("now"));
        
        $person->setIsPrimary(true);
        
        // Add Contact Type
        if ($ecc) {
           $unitClass = $this->getDoctrine()
                ->getRepository($bundle.':UnitClass')
                ->findOneByControlCode($ecc);
           if ($unitClass) {
               $unit->addUnitClass($unitClass);
           }
        }
        
        //Add Default Contact Person
        $contactClass = $this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('EMAIL');
        $email->setContactClass($contactClass);
        
        $email->setPerson($person);
        $person->addContact($email);
        $unit->addPerson($person);
        $person->setUnit($unit);

        // Create Default Postal Address
        $postalLocationClass = $this->getDoctrine()
                ->getRepository($bundle.':LocationClass')
                ->findOneByControlCode('POSTAL');
        $postalLocation->setLocationClass($postalLocationClass);
        
        $unit->addLocation($postalLocation);
        $postalLocation->setUnit($unit);
        
        // Create Default Physical Address
        $physicalLocationClass = $this->getDoctrine()
                ->getRepository($bundle.':LocationClass')
                ->findOneByControlCode('PHYSICAL');
        $physicalLocation->setLocationClass($physicalLocationClass);
        $unit->getLocations()->add($physicalLocation);
        $physicalLocation->setUnit($unit);
        
        //  Add default contacts, e.g. telephone, fax, website
        $telephoneContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('TELEPHONE'));
        $unit->addContact($telephoneContact);
        $telephoneContact->setUnit($unit);
        
        $faxContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('FAX'));
        $unit->addContact($faxContact);
        $faxContact->setUnit($unit);
        
        $mobileContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('MOBILE'));
        $unit->addContact($mobileContact);
        $mobileContact->setUnit($unit);
        
        $directContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('DIRECT'));
        $unit->addContact($directContact);
        $directContact->setUnit($unit);
        
        $websiteContact->setContactClass($this->getDoctrine()
                ->getRepository($bundle.':ContactClass')
                ->findOneByControlCode('WEBSITE'));
        $unit->addContact($websiteContact);
        $websiteContact->setUnit($unit);
        
        return $unit;
    }

    /**
     * Finds and displays a Entity unit.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MorusAcceticBundle:Unit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Entity unit.');
        }

        $deleteForm = $this->genDeleteForm($id);

        return $this->render('MorusAcceticBundle:Contacts:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Entity unit.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $unit = $em->getRepository('MorusAcceticBundle:Unit')->find($id);

        if (!$unit) {
            throw $this->createNotFoundException('Unable to find Entity unit.');
        }

        $editForm = $this->genEditForm($unit);
        $deleteForm = $this->genDeleteForm($id);

        return $this->render('MorusAcceticBundle:Contacts:edit.html.twig', array(
            'unit'      => $unit,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Entity unit.
    *
    * @param Entity $unit The Unit
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function genEditForm(Unit $unit)
    {
        $form = $this->createForm('accetic_unit', $unit, array(
            'action' => $this->generateUrl('morus_accetic_contacts_update', array('id' => $unit->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Entity unit.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $unit = $em->getRepository('MorusAcceticBundle:Unit')->find($id);

        if (!$unit) {
            throw $this->createNotFoundException('Unable to find Entity unit.');
        }

        $deleteForm = $this->genDeleteForm($id);
        $editForm = $this->genEditForm($unit);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_contacts'));
        }

        return $this->render('MorusAcceticBundle:Contacts:edit.html.twig', array(
            'unit'      => $unit,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Entity unit.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->genDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $unit = $em->getRepository('MorusAcceticBundle:Unit')->find($id);

            if (!$unit) {
                throw $this->createNotFoundException('Unable to find Entity unit.');
            }

            $em->remove($unit);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('morus_accetic_contacts'));
    }

    /**
     * Creates a form to delete a Entity unit by id.
     *
     * @param mixed $id The unit id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function genDeleteForm($id)
    {
        return $this->createFormBuilder(null, array('attr' => array( 'id' => 'ct_del_form', 'style' => 'display:none')))
            ->setAction($this->generateUrl('morus_accetic_contacts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => $this->get('translator')->trans('btn.delete')))
            ->getForm();
    }
}
