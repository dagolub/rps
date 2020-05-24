<?php

use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;
use App\Strategy\RandomStrategy;
use App\Strategy\RockStrategy;
use App\Strategy\PaperStrategy;
use App\Strategy\ScissorsStrategy;

class GameTest extends TestCase
{
    public function testDefaultGameExecute()
    {
        $strategy = new RandomStrategy();

        $one = (new Player($strategy))->setName('Mike');
        $two = (new Player($strategy))->setName('Gorge');

        $numberOfGames = 10;
        $game = (new Game($one, $two))->play($numberOfGames);

        $this->assertEquals($numberOfGames, array_sum($game->getScore()));
    }

    public function testAllDrawGameTestExecute()
    {
        $strategy = new RockStrategy();

        $one = (new Player($strategy))->setName('Mike');
        $two = (new Player($strategy))->setName('Gorge');

        $numberOfGames = 10;
        $game = (new Game($one, $two))->play($numberOfGames);

        $this->assertEquals($numberOfGames, $game->getScore()['draw']);
    }

    public function testMikeWinnerGameExecute()
    {
        $rockStrategy = new RockStrategy();

        $scissorsStrategy = new ScissorsStrategy();

        $one = (new Player($rockStrategy))->setName('Mike');
        $two = (new Player($scissorsStrategy))->setName('Gorge');

        $numberOfGames = 10;
        $game = (new Game($one, $two))->play($numberOfGames);

        $this->assertEquals($numberOfGames, $game->getScore()['Mike']);
    }
}
