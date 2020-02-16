<?php

require_once __DIR__ . '/app/bootstrap.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($container->get(EntityManager::class));
