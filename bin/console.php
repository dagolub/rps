<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\AppKernel;

$kernel = new AppKernel('dev', false);
$kernel->boot();

$container = $kernel->getContainer();
$application = $container->get(Application::class);

$application->run();
