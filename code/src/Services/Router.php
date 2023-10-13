<?php

namespace Moris\Code\Services;

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
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = trim($uri['path'], '/');
        parse_str($uri['query'] ?? '', $queryArray);

        switch ($path) {
            case self::RELATED_LINKS:
                return $this->controller->fetchData($queryArray);
            default:
                throw new NotFoundHttpException('Url not found');
        }
    }
}
