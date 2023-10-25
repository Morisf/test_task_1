<?php

namespace Moris\Code\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ExceptionHandler
{
    public function handle(\Throwable $exception): Response
    {
        $code = $exception instanceof CustomExceptionInterface ? $exception->getCode(
        ) : Response::HTTP_INTERNAL_SERVER_ERROR;

        return new Response(
            json_encode(['error' => $exception->getMessage()]),
            $code
        );
    }
}
