<?php
declare(strict_types=1);
namespace App\Command;

use App\Game;
use App\Player;
use App\Rules\RulesSimple;
use App\Strategy\RandomStrategy;
use App\Strategy\PaperStrategy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Score;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Validator\Constraints as Assert;

class GameCommand extends Command
{
    protected static $defaultName = 'app:game';

    protected function configure()
    {
        $this->setDescription('Star new game.')
             ->setHelp('The game is played automatically by default 100 games');

        $this->addOption(
            'number-games',
            'ng',
            InputOption::VALUE_OPTIONAL,
            'How many times should play game',
            100
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ( !$number_of_games = $this->getNumberOfGames($input, $output) ) {
            return 0;
        }

        $score = new Score();
        $rules = new RulesSimple();
        $mike = (new Player(new RandomStrategy()))->setName('Mike');
        $gorge = (new Player(new PaperStrategy()))->setName('Gorge');

        $n = 0;
        while ($n < $number_of_games ) {
            $winner = (new Game($mike, $gorge, $rules))->play();
            $score->addScore($winner);
            $n++;
        }

        $io = new SymfonyStyle($input, $output);
        call_user_func_array([$io,'definitionList'], $score->getScore($mike->getName(), $gorge->getName()));

        return 0;
    }

    private function getNumberOfGames(InputInterface $input, OutputInterface $output)
    {
        $number_of_games = (int)$input->getOption('number-games');
        if ( $number_of_games < 1 || $number_of_games > 1000 ) {
            $output->writeln("Number of games must be from 1 to 1000");
            return false;
        }

        return $number_of_games;
    }

}
