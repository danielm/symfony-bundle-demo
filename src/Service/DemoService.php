<?php

namespace Danielm\DemoBundle\Service;

use Danielm\DemoBundle\Contract\DemoServiceInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;

class DemoService implements DemoServiceInterface {

    public function __construct(
        protected ContainerInterface $container
    ) {
        return $this;
    }

    public function sum(int $a, int $b): int
    {
        return $a + $b;
    }
}
