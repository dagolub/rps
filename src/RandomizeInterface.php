<?php

namespace App;

interface RandomizeInterface {
    public function getRandomNumber(int $to_number): int;
}