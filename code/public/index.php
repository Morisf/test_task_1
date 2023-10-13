<?php
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$router = Moris\Code\Core\Container::get('router');
$response = $router->handleRequest();
echo $response->send();