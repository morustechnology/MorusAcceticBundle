<?php

namespace Morus\AcceticBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class LocationType extends AbstractType
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
            ->add('locationClassControlCode', 'hidden')
            ->add('address', 'textarea', array(
                        'required' => false
                ))
            ->add('city', 'text', array(
                        'required' => false
                ))
            ->add('state', 'text', array(
                        'required' => false
                ))
            ->add('zipCode', 'text', array(
                        'required' => false
                ))
            ->add('country', 'country', array(
                        'required' => false
                ))
            ->add('attention', 'text', array(
                        'required' => false
                ));
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->container->getParameter('morus_accetic.model.location'),
        ));
    }

    
    public function getName()
    {
        return 'accetic_location';
    }
}
?>
