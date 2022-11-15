<?php

namespace Danielm\DemoBundle\Tests;

use Danielm\DemoBundle\DanielmDemoBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Danielm\DemoBundle\DanielmDemoBundle(),
        ];
    }

    public function getProjectDir(): string
    {
        return __DIR__;
    }
}