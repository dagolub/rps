<?php

namespace App;

class Player
{
    private string $name;
    private RandomizeInterface $randomizer;

    public function __construct(RandomizeInterface $randomizer)
    {
        $this->randomizer = $randomizer;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function makeChoice($choices)
    {
        $random_index = $this->randomizer->getRandomNumber(count($choices)-1);
        return $choices[$random_index];
    }
}
