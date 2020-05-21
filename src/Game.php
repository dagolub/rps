<?php
namespace App;

use App\Player;

class Game
{
    private Player $one;
    private Player $two;
    private array $score = ['draw'=>0];
    private array $choices = ['rock','paper','scissors'];

    public function __construct()
    {

    }

    public function firstWinner($one_result, $two_result)
    {
        $win_index = (string) array_search($one_result, $this->choices) . array_search($two_result, $this->choices);
        if ( in_array($win_index, ['21', '10', '02']) ) {
            return true;
        }
        return false;
    }

    public function addPlayers(Player $one, Player $two) {
        $this->one = $one;
        $this->score[$one->getName()] = 0;
        $this->two = $two;
        $this->score[$two->getName()] = 0;
    }

    public function play()
    {
        foreach (range(1, 100) as $n) {
            $one_result = $this->one->makeChoice($this->choices);
            $two_result = $this->two->makeChoice($this->choices);
            if ($one_result === $two_result) {
                $this->score['draw']++;
            } else {
                $winner = $this->firstWinner($one_result, $two_result) ? $this->one : $this->two;
                $this->score[$winner->getName()]++;
            }
        }
    }

    public function showScore()
    {
        print_r($this->score);
    }
}