<?php
declare(strict_types=1);
namespace App\Strategy;

use App\Rules\RulesComplex;

class WellStrategy implements StrategyInterface
{
    public function getRandomNumber(int $to_number): int
    {
        return RulesComplex::WELL_INDEX;
    }
}
