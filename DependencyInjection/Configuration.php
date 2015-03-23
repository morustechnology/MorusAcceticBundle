<?php

namespace Morus\AcceticBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('morus_accetic');

        $rootNode
            ->children()
                ->arrayNode('entities')
                    ->children()
                        ->scalarNode('accetic_config')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\AcceticConfig')
                        ->end()
                        ->scalarNode('ap')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Ap')
                        ->end()
                        ->scalarNode('ar')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Ar')
                        ->end()
                        ->scalarNode('contact')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Contact')
                        ->end()
                        ->scalarNode('contact_class')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\ContactClass')
                        ->end()
                        ->scalarNode('invoice')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Invoice')
                        ->end()
                        ->scalarNode('invoice_note')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\InvoiceNote')
                        ->end()
                        ->scalarNode('location')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Location')
                        ->end()
                        ->scalarNode('location_class')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\LocationClass')
                        ->end()
                        ->scalarNode('product')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Product')
                        ->end()
                        ->scalarNode('person')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Person')
                        ->end()
                        ->scalarNode('transaction')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Transaction')
                        ->end()
                        ->scalarNode('unit')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\Unit')
                        ->end()
                        ->scalarNode('unit_class')
                            ->isRequired()
                            ->cannotBeEmpty()
                            ->defaultValue('Morus\AcceticBundle\Entity\UnitClass')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
