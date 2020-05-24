<?php
declare(strict_types=1);
namespace App\Strategy;

class RandomStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return rand(0, $to_number);
    }
}
