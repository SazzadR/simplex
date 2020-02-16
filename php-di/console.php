<?php

require_once __DIR__ . '/app/bootstrap.php';

use Symfony\Component\Console\Application;

$app = new Application();

$app->addCommands([
    $container->get('App\Commands\HelloWorldCommand'),
    $container->get('App\Commands\DoctrineCommand'),
    $container->get('App\Commands\ArticlesCommand'),
]);

$app->run();
