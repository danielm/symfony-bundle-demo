<?php

namespace Danielm\DemoBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class UnnecessaryEvent extends Event
{
    public function __construct(
        protected string $data
    ) {
    }

    public function getData(): string
    {
        return $this->data;
    }

    public const NAME = 'unnecessary';
}
