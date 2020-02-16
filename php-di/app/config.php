<?php

use DI\Container;
use Twig\Environment;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Twig\Loader\FilesystemLoader;
use App\Repositories\ArticlesRepository;
use App\Repositories\ArticlesRepositoryInterface;

return [
    Environment::class => function () {
        $loader = new FilesystemLoader(__DIR__ . '/../src/Views');
        return new Environment($loader);
    },

    EntityManager::class => function () {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;

        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../src/Models'],
            $isDevMode,
            $proxyDir,
            $cache,
            $useSimpleAnnotationReader
        );
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../db.sqlite',
        ];

        return EntityManager::create($connection, $config);
    },

    ArticlesRepositoryInterface::class => function (Container $container) {
        return new ArticlesRepository(($container->get(EntityManager::class)));
    }
];
