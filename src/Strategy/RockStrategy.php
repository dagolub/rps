<?php
declare(strict_types=1);
namespace App\Strategy;

class RockStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return 0;
    }
}
