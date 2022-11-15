<?php

namespace Danielm\DemoBundle\Tests\Unit;

use Danielm\DemoBundle\Contract\DemoServiceInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DemoServiceTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return \Danielm\DemoBundle\Tests\Kernel::class;
    }

    public function testDemoService(): void
    {
        self::bootKernel();

        $container = static::getContainer();

        $demoService = $container->get(DemoServiceInterface::class);

        // The default implementation of DemoServiceInterface is just an addition of its parameters
        $this->assertEquals(4, $demoService->calc(2, 2));
    }
}
