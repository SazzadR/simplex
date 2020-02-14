<?php

$container = require_once __DIR__ . '/app/bootstrap.php';

use Symfony\Component\Console\Application;

$app = new Application();

$app->addCommands([
    $container->get('App\Command\HelloWorldCommand'),
]);

$app->run();
