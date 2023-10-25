<?php

namespace Moris\Code\Controllers;

use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    public function render(string|array $body, string $contentType = 'application/json', $statusCode = 200): Response;
}
