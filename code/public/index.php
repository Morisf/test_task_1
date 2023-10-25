<?php

require '../vendor/autoload.php';

use Moris\Code\Exceptions\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

try {
    $router = Moris\Code\Core\Container::get('router');
    $response = $router->handleRequest();
    $response->send();
} catch (\Throwable $e) {
    $handler = new ExceptionHandler();
    $errorResponse = $handler->handle($e);
    $errorResponse->send();
}
