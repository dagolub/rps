<?php
declare(strict_types=1);

namespace App\Rules;

interface RulesInterface
{
    public function getChoices(): array;

    public function isTheFirstWinner(string $one_result, string $two_result): bool;

}