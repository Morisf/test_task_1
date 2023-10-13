<?php

namespace Moris\Code\Controllers;

use Symfony\Component\HttpFoundation\Response;

interface ControllerInterface
{
    public function render(string|array $body): Response;
}
