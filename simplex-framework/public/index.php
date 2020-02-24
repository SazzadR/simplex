<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use Core\Factory\AppFactory;

// Build PHP-DI container instance
$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();

// Initiate the app
AppFactory::setContainer($container);
$app = AppFactory::create();

// Register routes
$routes = require_once __DIR__ . '/../app/routes.php';
$routes($app);
