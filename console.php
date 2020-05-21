<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\GameCommand;

$application = new Application();

$application->add(new GameCommand());

$application->run();
