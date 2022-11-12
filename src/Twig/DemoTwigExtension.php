<?php
namespace Danielm\DemoBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class DemoTwigExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('demoFcn', [$this, 'demo']),
        ];
    }
    public function demo()
    {
        return "Howdy from the Twig Extension";
    }
}
