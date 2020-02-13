<?php

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;

$container = require_once __DIR__ . '/../app/bootstrap.php';


$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\Controller\HomeController', 'home']);
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) {
    case Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];

        $container->call($controller, $parameters);
        break;
}
