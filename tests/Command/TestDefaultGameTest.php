<?php

use App\Game;
use App\Player;
use App\Randomize;
use PHPUnit\Framework\TestCase;

class TestDefaultGameTest   extends TestCase
{
    public function testExecute()
    {
        $randomizer = new Randomize();

        $one = (new Player($randomizer))->setName('Mike');
        $two = (new Player($randomizer))->setName('Gorge');

        $numberOfGames = 10;
        $game = (new Game())->addPlayers($one, $two)->play($numberOfGames);

        $this->assertEquals($numberOfGames, array_sum($game->getScore()));
    }
}