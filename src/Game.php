<?php

namespace App;

class Game
{
    private Player $one;
    private Player $two;
    private array $score;
    private array $choices = ['rock','paper','scissors'];

    public function __construct()
    {
    }

    public function isTheFirstWinner(string $one_result, string $two_result): bool
    {
        $win_index = (string) array_search($one_result, $this->choices) . array_search($two_result, $this->choices);

        return in_array($win_index, ['21', '10', '02']);
    }

    public function addPlayers(Player $one, Player $two): Game
    {
        $this->one = $one;
        $this->two = $two;

        $this->score[$one->getName()] = 0;
        $this->score[$two->getName()] = 0;
        $this->score['draw'] = 0;

        return $this;
    }

    public function play($number_of_games = 100): Game
    {
        foreach (range(1, $number_of_games) as $n) {
            $one_result = $this->one->makeChoice($this->choices);
            $two_result = $this->two->makeChoice($this->choices);

            if ( $one_result === $two_result ) {
                $this->score['draw']++;
            } else {
                $winner = $this->isTheFirstWinner($one_result, $two_result) ? $this->one : $this->two;
                $this->score[$winner->getName()]++;
            }
        }

        return $this;
    }

    public function getScore()
    {
        $result = [];
        foreach ($this->score as $k => $v)
        {
            $result[] = $k . ": " . $v;
        }
        return $result;
    }
}
