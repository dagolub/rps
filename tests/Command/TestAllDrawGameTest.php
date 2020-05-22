<?php

use App\Game;
use App\Player;
use PHPUnit\Framework\TestCase;
use App\RandomizeInterface;

// тесты, которые тестируют 1 класс обычно складывают в 1 файл и тесты методами пишут. у тебя 3 теста разбиты в 3 файла.
class TestAllDrawGameTest   extends TestCase
{
    public function testExecute()
    {
        $randomizer = new class implements RandomizeInterface {
            public function getRandomNumber(int $to_number): int
            {
                return 0;
            }
        };

        $one = (new Player($randomizer))->setName('Mike');
        $two = (new Player($randomizer))->setName('Gorge');

        $numberOfGames = 10;
        $game = (new Game())->addPlayers($one, $two)->play($numberOfGames);

        $this->assertEquals($numberOfGames, $game->getScore()['draw']);
    }
}