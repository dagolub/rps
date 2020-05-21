<?php

namespace App;

class Player
{
    private string $name;

    public function __construct()
    {
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
        return $choices[rand(0, count($choices)-1)];
    }
}
