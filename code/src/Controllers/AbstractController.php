<?php

namespace Moris\Code\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController implements ControllerInterface
{
    public function __construct(
        private Response $response
    ) {
    }

    public function render(string|array $body, string $contentType = ResponseContentType::JSON_RESPONSE_CONTENT_TYPE, $statusCode = 200): Response
    {
        $this->response->setStatusCode($statusCode);
        $this->response->headers->set('Content-Type', $contentType);
        $this->response->setContent(is_array($body) ? json_encode($body) : $body);

        return $this->response;
    }
}
