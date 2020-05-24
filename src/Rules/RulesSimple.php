<?php
declare(strict_types=1);

namespace App\Rules;

class RulesSimple implements RulesInterface
{
    const ROCK_INDEX = 0;
    const PAPER_INDEX = 1;
    const SCISSORS_INDEX = 2;

    public function getChoices(): array
    {
        return [
            self::ROCK_INDEX => 'rock',
            self::PAPER_INDEX => 'paper',
            self::SCISSORS_INDEX => 'scissors'
        ];
    }

    public function isTheFirstWinner(string $one_result, string $two_result): bool
    {
        if (
            $one_result === 'scissors' && $two_result === 'paper' ||
            $one_result === 'paper' && $two_result === 'rock' ||
            $one_result === 'rock' && $two_result === 'scissors'
        ) {
            return true;
        }
        return false;
    }
}