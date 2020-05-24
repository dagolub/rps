<?php

use App\Game;
use App\Player;
use App\Rules\RulesSimple;
use App\Rules\RulesComplex;
use App\Score;
use PHPUnit\Framework\TestCase;
use App\Strategy\RandomStrategy;
use App\Strategy\RockStrategy;
use App\Strategy\PaperStrategy;
use App\Strategy\ScissorsStrategy;

class GameTest extends TestCase
{
    public function testDefaultGameExecute()
    {
        $score = new Score();
        $rules = new RulesSimple();
        $mike = (new Player(new RandomStrategy()))->setName('Mike');
        $gorge = (new Player(new PaperStrategy()))->setName('Gorge');

        $n = 0;
        $numberOfGames = 10;
        while ($n < $numberOfGames) {
            $winner = (new Game($mike, $gorge, $rules))->play();
            $score->addScore($winner);
            $n++;
        }

        $this->assertEquals($numberOfGames, array_sum($score->getRawScore()));
    }

    public function testAllDrawGameTestExecute()
    {
        $score = new Score();
        $rules = new RulesSimple();
        $mike = (new Player(new RockStrategy()))->setName('Mike');
        $gorge = (new Player(new RockStrategy()))->setName('Gorge');

        $n = 0;
        $numberOfGames = 10;
        while ($n < $numberOfGames) {
            $winner = (new Game($mike, $gorge, $rules))->play();
            $score->addScore($winner);
            $n++;
        }

        $this->assertEquals($numberOfGames, $score->getRawScore()[3]);
    }

    public function testMikeWinnerGameExecute()
    {
        $score = new Score();
        $rules = new RulesSimple();
        $mike = (new Player(new RockStrategy()))->setName('Mike');
        $gorge = (new Player(new ScissorsStrategy()))->setName('Gorge');

        $n = 0;
        $numberOfGames = 10;
        while ($n < $numberOfGames) {
            $winner = (new Game($mike, $gorge, $rules))->play();
            $score->addScore($winner);
            $n++;
        }

        $this->assertEquals($numberOfGames, $score->getRawScore()[1]);
    }

    public function testComplexGameExecute()
    {
        $score = new Score();
        $rules = new RulesComplex();
        $mike = (new Player(new RandomStrategy()))->setName('Mike');
        $gorge = (new Player(new RandomStrategy()))->setName('Gorge');

        $n = 0;
        $numberOfGames = 10;
        while ($n < $numberOfGames) {
            $winner = (new Game($mike, $gorge, $rules))->play();
            $score->addScore($winner);
            $n++;
        }

        $this->assertEquals($numberOfGames, array_sum($score->getRawScore()));
    }
}
