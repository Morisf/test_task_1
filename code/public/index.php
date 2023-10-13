<?php
ini_set('display_errors', 1);

require '../vendor/autoload.php';

header('Content-Type: application/json');

$router = Moris\Code\Core\Container::get('router');
$response = $router->handleRequest();
echo json_encode($response);