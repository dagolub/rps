<?php
declare(strict_types=1);
namespace App;


class Game
{
    private Player $one;
    private Player $two;
    private Rules\RulesInterface $rules;

    public function __construct(Player $one, Player $two, Rules\RulesInterface $rules)
    {
        $this->one = $one;
        $this->two = $two;

        $this->rules = $rules;
    }


    public function play(): int
    {
        $one_result = $this->one->makeChoice($this->rules->getChoices());
        $two_result = $this->two->makeChoice($this->rules->getChoices());

        if ($this->rules->isTheFirstWinner($one_result, $two_result)) {
            return 1;
        } elseif ($one_result === $two_result) {
            return 3;
        } else {
            return 2;
        }
    }
}
