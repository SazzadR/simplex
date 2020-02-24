<?php

namespace Core\Factory;

use Core\App;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

class AppFactory
{
    protected static $responseFactory;

    protected static $container;

    public static function create(): App
    {
        return new App(static::determineResponseFactory(), static::$container);
    }

    public static function determineResponseFactory(): ResponseInterface
    {
        //
    }

    public static function setContainer(ContainerInterface $container): void
    {
        static::$container = $container;
    }
}
