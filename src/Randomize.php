<?php
declare(strict_types=1);
namespace App;

class Randomize implements RandomizeInterface
{
    // int $to_number. mixed тут ни к чему. тем более у тебя в интерфейсе int $to_number
    public function getRandomNumber($to_number = 2): int
    {
        return rand(0, $to_number);
    }
}