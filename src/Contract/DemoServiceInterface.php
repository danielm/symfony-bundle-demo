<?php

namespace Danielm\DemoBundle\Contract;


interface DemoServiceInterface {
    public function sum(int $a, int $b): int;
}