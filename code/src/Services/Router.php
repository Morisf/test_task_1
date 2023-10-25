<?php

namespace Moris\Code\Services;

use Moris\Code\Exceptions\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{
    public const RELATED_LINKS = 'related-links';
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function handleRequest(): Response
    {
        $request = Request::createFromGlobals();
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = trim($uri['path'], '/');

        switch ($path) {
            case self::RELATED_LINKS:
                return $this->controller->fetchData($request);
            default:
                throw new NotFoundHttpException('Url not found', Response::HTTP_NOT_FOUND);
        }
    }
}
