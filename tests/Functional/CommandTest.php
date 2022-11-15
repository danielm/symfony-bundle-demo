<?php

namespace Danielm\DemoBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CommandTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return \Danielm\DemoBundle\Tests\Kernel::class;
    }

    public function testCommand(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $commandTester = new CommandTester($application->find('demo:command'));
        $commandTester->execute(['Joe']);

        $commandTester->assertCommandIsSuccessful();

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Hello Joe!', $output);
    }
}
