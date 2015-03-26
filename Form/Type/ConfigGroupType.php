<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class ConfigGroupType extends AbstractType
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
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('acceticConfigs', 'collection', array(
                'label' => false,
                'type' => 'accetic_config',
                'allow_add'    => false,
                'allow_delete' => false,
                'prototype' => false,
                'by_reference' => false,
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('morus_accetic.model.accetic_config_group'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_config_group';
    }
}
