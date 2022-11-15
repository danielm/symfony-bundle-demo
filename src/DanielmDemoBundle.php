<?php

namespace Danielm\DemoBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DanielmDemoBundle extends AbstractBundle
{
    public function configure(DefinitionConfigurator $definition): void
    {
        // $definition->import('../config/definition.php');

        $definition->rootNode()
            ->children()
                ->arrayNode('some_node')
                    ->children()
                        ->integerNode('required_number_value')->isRequired()->end()
                        ->scalarNode('optional_value')->defaultValue('Default Value')->end()
                        ->scalarNode('env_value')->cannotBeEmpty()->end()
                        ->scalarNode('secret_value')->defaultNull()->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        // load an XML, PHP or Yaml file
        $container->import('../config/services.yaml');

        $container->services()->set('danielm_demo.configuration', Configuration::class)
            ->arg('$required_number_value', $config['some_node']['required_number_value'])
            ->arg('$optional_value', $config['some_node']['optional_value'])
            ->arg('$env_value', $config['some_node']['env_value'])
            ->arg('$secret_value', $config['some_node']['secret_value']);

        /*$container->services()
            ->get('danielm.demo.some_service_name')
            ->arg(0, $config['some_node']['env_value'])
            ->arg(1, $config['some_node']['optional_value'])
        ;*/
    }
}
