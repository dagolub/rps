<?php
declare(strict_types=1);
namespace App\Strategy;
use App\Rules\RulesSimple;

class RockStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return RulesSimple::ROCK_INDEX;
    }
}
