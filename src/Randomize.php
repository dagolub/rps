<?php
declare(strict_types=1);
namespace App;

class Randomize implements RandomizeInterface
{
    public function getRandomNumber($to_number = 2): int
    {
        return rand(0, $to_number);
    }
}