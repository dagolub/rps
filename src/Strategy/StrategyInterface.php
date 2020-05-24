<?php

namespace App\Strategy;

interface StrategyInterface
{
    public function getRandomNumber(int $to_number): int;
}
