<?php

namespace Danielm\DemoBundle;

use Danielm\DemoBundle\Command\DemoCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DanielmDemoBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        // load an XML, PHP or Yaml file
        $container->import('Resources/config/services.yaml');
    }

    public function registerCommands(Application $application): void
    {
        $application->add(new DemoCommand());
    }
}