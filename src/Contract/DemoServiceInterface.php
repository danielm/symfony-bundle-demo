<?php

namespace Danielm\DemoBundle\Contract;

interface DemoServiceInterface
{
    public function calc(int $a, int $b): int;
}
