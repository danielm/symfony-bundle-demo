<?php

namespace Danielm\DemoBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class UnnecessaryEvent extends Event
{
    public const NAME = 'unnecessary';
}
