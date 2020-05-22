<?php
declare(strict_types=1);
namespace App;

class Player
{
    /**
     * если я не вызову setName, то получу ошибку, когда попытаюсь обратиться к name.
     * нужно определять дефолтное значение, или указывать в конструкторе
     */
    private string $name;
    private RandomizeInterface $randomizer;

    public function __construct(RandomizeInterface $randomizer)
    {
        $this->randomizer = $randomizer;
    }

    // не забываем return type (public function setName(string $name):self)
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
