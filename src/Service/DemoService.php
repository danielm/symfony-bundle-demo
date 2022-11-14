<?php

namespace Danielm\DemoBundle\Service;

use Danielm\DemoBundle\Configuration;
use Danielm\DemoBundle\Contract\DemoServiceInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class DemoService implements DemoServiceInterface {

    /*public function __construct(
        protected ContainerInterface $container,
        protected Configuration $configuration,
    ) {  }*/

    public function calc(int $a, int $b): int
    {
        return $a + $b;
    }
}
