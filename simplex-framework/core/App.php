<?php

namespace Core;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

class App
{
    public function __construct(ResponseInterface $responseFactory, ContainerInterface $container)
    {
        //
    }
}
