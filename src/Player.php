<?php
declare(strict_types=1);
namespace App;

use App\Strategy\StrategyInterface;

class Player
{
    private string $name;
    private StrategyInterface $strategy;

    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
        $this->name = "no name";
    }

    public function setName(string $name):self
    {
        $this->name = $name;
        return $this;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function makeChoice($choices):string
    {
        $random_index = $this->strategy->getRandomNumber(count($choices)-1);
        return $choices[$random_index];
    }
}
