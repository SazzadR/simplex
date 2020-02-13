<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

return [
    Environment::class => function () {
        $loader = new FilesystemLoader(__DIR__ . '/../src/Views');
        return new Environment($loader);
    }
];
