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
    public function listAction($ecc)
    {
        $controlCode = strtoupper($ecc);

        $em = $this->getDoctrine()->getManager();
        
        if ($controlCode == 'ALL') {
            $contacts = $em
                ->getRepository('MorusAcceticBundle:Unit')->findAllList();
        } else {
            $contacts = $em
                ->getRepository('MorusAcceticBundle:Unit')->findListByControlCode($controlCode);
        }
        
        return $this->render('MorusAcceticBundle:Contacts:list.html.twig', array(
            'contacts' => $contacts,
        ));
    }
    
    /**
     * Creates a new Unit entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = $this->createUnit();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_contacts_show', array('id' => $entity->getId())));
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
    private function createCreateForm(Unit $unit)
    {
        $form = $this->createForm('accetic_unit', $unit, array(
            'action' => $this->generateUrl('morus_accetic_contacts_create'),
            'method' => 'POST',
        ));
        
        $form->add('submit', 'submit', array(
                'label' => $this->get('translator')->trans('contact.btn.save'),
                'attr' => array('class' => 'green-btn')
                ));

        return $form;
    }

    private function createUnit($type = null)
    {
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
        if ($type) {
           $unitClass = $this->getDoctrine()
                ->getRepository('MorusAcceticBundle:UnitClass')
                ->findOneByControlCode($type);
           if ($unitClass) {
               $unit->addUnitClass($unitClass);
           }
        }
        
        //Add Default Contact Person
        $contactClass = $this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('EMAIL');
        $email->setContactClass($contactClass);
        
        $email->setPerson($person);
        $person->addContact($email);
        $unit->addPerson($person);
        $person->setUnit($unit);

        // Create Default Postal Address
        $postalLocationClass = $this->getDoctrine()
                ->getRepository('MorusAcceticBundle:LocationClass')
                ->findOneByControlCode('POSTAL');
        $postalLocation->setLocationClass($postalLocationClass);
        
        $unit->addLocation($postalLocation);
        $postalLocation->setUnit($unit);
        
        // Create Default Physical Address
        $physicalLocationClass = $this->getDoctrine()
                ->getRepository('MorusAcceticBundle:LocationClass')
                ->findOneByControlCode('PHYSICAL');
        $physicalLocation->setLocationClass($physicalLocationClass);
        $unit->getLocations()->add($physicalLocation);
        $physicalLocation->setUnit($unit);
        
        //  Add default contacts, e.g. telephone, fax, website
        $telephoneContact->setContactClass($this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('TELEPHONE'));
        $unit->addContact($telephoneContact);
        $telephoneContact->setUnit($unit);
        
        $faxContact->setContactClass($this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('FAX'));
        $unit->addContact($faxContact);
        $faxContact->setUnit($unit);
        
        $mobileContact->setContactClass($this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('MOBILE'));
        $unit->addContact($mobileContact);
        $mobileContact->setUnit($unit);
        
        $directContact->setContactClass($this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('DIRECT'));
        $unit->addContact($directContact);
        $directContact->setUnit($unit);
        
        $websiteContact->setContactClass($this->getDoctrine()
                ->getRepository('MorusAcceticBundle:ContactClass')
                ->findOneByControlCode('WEBSITE'));
        $unit->addContact($websiteContact);
        $websiteContact->setUnit($unit);
        
        return $unit;
    }
    
    /**
     * Displays a form to create a new Entity unit.
     *
     */
    public function newAction()
    {        
        
        $entity = $this->createUnit();
        $form = $this->createCreateForm($entity);

        return $this->render('MorusAcceticBundle:Contacts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to create a new Supplier Entity unit .
     *
     */
    public function newSupplierAction()
    {        
        $entity = $this->createUnit('SUPPLIER');
        $form = $this->createCreateForm($entity);

        return $this->render('MorusAcceticBundle:Contacts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to create a new Employee Entity unit .
     *
     */
    public function newEmployeeAction()
    {        
        $entity = $this->createUnit('EMPLOYEE');
        $form = $this->createCreateForm($entity);

        return $this->render('MorusAcceticBundle:Contacts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
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

        $deleteForm = $this->createDeleteForm($id);

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

        $editForm = $this->createEditForm($unit);
        $deleteForm = $this->createDeleteForm($id);

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
    private function createEditForm(Unit $unit)
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

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($unit);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('morus_accetic_contacts_edit', array('id' => $id)));
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
        $form = $this->createDeleteForm($id);
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
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(null, array('attr' => array( 'id' => 'ct_del_form', 'style' => 'display:none')))
            ->setAction($this->generateUrl('morus_accetic_contacts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => $this->get('translator')->trans('btn.delete')))
            ->getForm();
    }
}
