<?php

namespace App\Command;

use App\Game;
use App\Player;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameCommand extends Command
{
    protected static $defaultName = 'app:game';

    public function __construct($name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Star new game.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('The game is played automatically by default 100 games')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mike = (new Player())->setName('Mike');
        $gorge = (new Player())->setName('Gorge');

        $game = new Game();
        $game->addPlayers($mike, $gorge);
        $game->play();
        $game->showScore();

        return 0;
    }
}