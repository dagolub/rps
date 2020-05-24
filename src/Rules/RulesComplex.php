<?php
declare(strict_types=1);

namespace App\Rules;

class RulesComplex implements RulesInterface
{
    const ROCK_INDEX = 0;
    const PAPER_INDEX = 1;
    const SCISSORS_INDEX = 2;
    const WELL_INDEX = 3;

    public function getChoices(): array
    {
        return [
            self::ROCK_INDEX => 'rock',
            self::PAPER_INDEX => 'paper',
            self::SCISSORS_INDEX => 'scissors',
            self::WELL_INDEX => 'well'
        ];
    }

    public function isTheFirstWinner(string $one_result, string $two_result): bool
    {
        if (
            $one_result === 'scissors' && $two_result === 'paper' ||
            $one_result === 'rock' && $two_result === 'scissors' ||
            $one_result === 'rock' && $two_result === 'paper' ||
            $one_result === 'paper' && $two_result === 'well'
        ) {
            return true;
        }
        return false;
    }
}
