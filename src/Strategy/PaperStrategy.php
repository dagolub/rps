<?php
declare(strict_types=1);
namespace App\Strategy;
use App\Strategy\StrategyInterface;

class PaperStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return 1;
    }
}
