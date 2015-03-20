<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class ArType extends AbstractType
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
            ->add('unit', 'entity', array(
                'class' => $this->container->getParameter('morus_accetic.model.unit'),
                'property' => 'name'
            ))
            ->add('invnumber', 'text')
            ->add('transdate', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date'),
                'required' => false,
            ))
            ->add('duedate', 'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => array('class' => 'date'),
                'required' => false,
            ))
            ->add('reference', 'text', array(
                'required' => false,
            ))
            ->add('transaction', 'accetic_transaction', array('label' => false));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('morus_accetic.model.ar'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'accetic_ar';
    }
}
