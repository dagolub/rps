<?php
declare(strict_types=1);

namespace App;

class Score
{
    private array $score;

    public function __construct()
    {
        $this->score[1] = 0;
        $this->score[2] = 0;
        $this->score[3] = 0;
    }

    public function addScore(int $player):self
    {
        $this->score[$player]++;
        return $this;
    }

    public function getRawScore(): array
    {
        return $this->score;
    }

    public function getScore($one_name, $two_name): array
    {
        return [
            [$one_name=> $this->score[1]],
            [$two_name=> $this->score[2]],
            ['draw'=> $this->score[3]]
        ];
    }
}
