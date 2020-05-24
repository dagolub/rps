<?php
declare(strict_types=1);
namespace App;


class Game
{
    private Player $one;
    private Player $two;
    private array $score;
    private array $choices = ['rock','paper','scissors'];

    public function __construct($one, $two)
    {
        $this->one = $one;
        $this->two = $two;

        $this->initScore();
    }

    private function initScore():void
    {
        $this->score[1] = 0;
        $this->score[2] = 0;
        $this->score['draw'] = 0;
    }

    public function isTheFirstWinner(string $one_result, string $two_result): bool
    {
        if (
            $one_result === 'scissors' && $two_result === 'paper' ||
            $one_result === 'paper' && $two_result === 'rock' ||
            $one_result === 'rock' && $two_result === 'scissors'
        ) {
            return true;
        }
        return false;
    }

    public function play(int $number_of_games = 100): self
    {
        $n = 0;
        while ($n < $number_of_games) {
            $one_result = $this->one->makeChoice($this->choices);
            $two_result = $this->two->makeChoice($this->choices);

            if ($this->isTheFirstWinner($one_result, $two_result)) {
                $this->score[1]++;
            } elseif ($one_result === $two_result) {
                $this->score['draw']++;
            } else {
                $this->score[2]++;
            }

            $n++;
        }

        return $this;
    }

    public function getScore(): array
    {
        return [
            $this->one->getName()=>$this->score[1],
            $this->two->getName()=>$this->score[2],
            'draw'=>$this->score['draw']
        ];
    }
}
