<?php

namespace Moris\Code\Services;

class Router
{
    const RELATED_LINKS = 'related-links';
    private $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function handleRequest()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = trim($uri['path'], '/');
        parse_str($uri['query'] ?? '', $queryArray);

        switch ($path) {
            case self::RELATED_LINKS:
                return $this->controller->fetchData($queryArray);
            default:
                http_response_code(404);
                return [
                    'status' => false,
                    'message' => "Url ot found"
                ];
        }
    }
}