<?php

namespace Morus\AcceticBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MorusAcceticExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $this->remapParametersNamespaces($config['entities'], $container, array(
            '' => array(
                'accetic_config'    => 'morus_accetic.model.accetic_config',
                'ap'                => 'morus_accetic.model.ap',
                'ar'                => 'morus_accetic.model.ar',
                'contact'           => 'morus_accetic.model.contact',
                'contact_class'     => 'morus_accetic.model.contact_class',
                'invoice'           => 'morus_accetic.model.invoice',
                'invoice_note'      => 'morus_accetic.model.invoice_note',
                'location'          => 'morus_accetic.model.location',
                'location_class'    => 'morus_accetic.model.location_class',
                'parts'             => 'morus_accetic.model.parts',
                'person'            => 'morus_accetic.model.person',
                'transaction'       => 'morus_accetic.model.transaction',
                'unit'              => 'morus_accetic.model.unit',
                'unit_class'        => 'morus_accetic.model.unit_class',
            ),
        ));
        
//        $this->remapParametersNamespaces($config['templates']['ar'], $container, array(
//           '' => array (
//               'index'  => 'morus_accetic.template.ar.index',
//            ), 
//        ));
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
    
    protected function remapParameters(array $config, ContainerBuilder $container, array $map)
    {
        foreach ($map as $name => $paramName) {
            if (array_key_exists($name, $config)) {
                $container->setParameter($paramName, $config[$name]);
            }
        }
    }

    protected function remapParametersNamespaces(array $config, ContainerBuilder $container, array $namespaces)
    {
        foreach ($namespaces as $ns => $map) {
            if ($ns) {
                if (!array_key_exists($ns, $config)) {
                    continue;
                }
                $namespaceConfig = $config[$ns];
            } else {
                $namespaceConfig = $config;
            }
            if (is_array($map)) {
                $this->remapParameters($namespaceConfig, $container, $map);
            } else {
                foreach ($namespaceConfig as $name => $value) {
                    $container->setParameter(sprintf($map, $name), $value);
                }
            }
        }
    }
}
