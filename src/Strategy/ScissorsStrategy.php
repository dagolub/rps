<?php
declare(strict_types=1);
namespace App\Strategy;

class ScissorsStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return 2;
    }
}
