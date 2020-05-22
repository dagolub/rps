<?php
declare(strict_types=1);
namespace App\Command;

use App\Game;
use App\Player;
use App\Randomize;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GameCommand extends Command
{
    protected static  $defaultName = 'app:game';

    public function __construct($name = null)
    {
        // этот конструктор лишний. он ничего не делает
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Star new game.')
             ->setHelp('The game is played automatically by default 100 games');

        $this->addOption('number-games',
                        'ng',
                        InputOption::VALUE_OPTIONAL,
                        'How many times should play game',
                        100
                        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $randomizer = new Randomize();
        // 2 игрока играют одинаково. в условии было 1 рандом, второй всегда бумага
        $mike = (new Player($randomizer))->setName('Mike');
        $gorge = (new Player($randomizer))->setName('Gorge');

        $game = (new Game())->addPlayers($mike, $gorge)
        // инпут нужно как-то нормализировать. сюда может прилететь любая строка. или -100
        ->play($input->getOption('number-games'));

        $io = new SymfonyStyle($input, $output);
        $dataToPrint = array_map(function($k, $v) { return [$k=>$v];},array_keys($game->getScore()),$game->getScore());
        call_user_func_array([$io,'definitionList'], $dataToPrint);
        return 0;
    }
}
