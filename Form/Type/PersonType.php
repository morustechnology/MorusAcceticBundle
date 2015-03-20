<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
    protected $container;
    
    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
   
        $builder
                    ->add('firstName', 'text', array(
                        'required' => false
                    ))
                    ->add('lastName', 'text', array(
                        'required' => false
                    ))
                    ->add('contacts', 'collection', array(
                        'type' => 'accetic_contact',
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'prototype' => true,
                    ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('morus_accetic.model.person'),
        ));
    }

    
    public function getName()
    {
        return 'accetic_person';
    }
}
?>
