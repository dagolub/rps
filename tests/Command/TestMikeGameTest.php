<?php

use App\Game;
use App\Player;
use App\RandomizeInterface;
use PHPUnit\Framework\TestCase;

class TestMikeGameTest   extends TestCase
{
    public function testExecute()
    {
        $alwaysRock = new class implements RandomizeInterface {
            public function getRandomNumber(int $to_number): int
            {
                return 0;
            }
        };

        $alwaysScissors = new class implements RandomizeInterface {
            public function getRandomNumber(int $to_number): int
            {
                return 2    ;
            }
        };

        $one = (new Player($alwaysRock))->setName('Mike');
        $two = (new Player($alwaysScissors))->setName('Gorge');
 
        $numberOfGames = 10;
        $game = (new Game())->addPlayers($one, $two)->play($numberOfGames);

        $this->assertEquals($numberOfGames, $game->getScore()['Mike']);
    }
}