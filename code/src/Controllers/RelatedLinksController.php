<?php

namespace Moris\Code\Controllers;

use Moris\Code\Services\RelatedLinks;
use Symfony\Component\HttpFoundation\Response;

class RelatedLinksController implements ControllerInterface
{
    public function __construct(private RelatedLinks $relatedLinksDB, private Response $response)
    {
    }

    public function fetchData($request): Response
    {
        if (!isset($request['domain'])) {
            $this->render(
                [
                    'status' => false,
                    'message' => 'Bad request, domain is required.',
                ],
                400
            );
        }

        $domain = htmlspecialchars($request['domain']);
        $limit = intval($request['number'] ?? 1);

        $relatedLinks = $this->relatedLinksDB->getRelatedLinks($domain, $limit);

        $list = $relatedLinks->getList();

        if (!$list) {
            return $this->render($list, Response::HTTP_NOT_FOUND);
        }

        return $this->render($list);
    }

    public function render(string|array $body, $statusCode = 200): Response
    {
        $this->response->setStatusCode($statusCode);
        $this->response->setContent(is_array($body) ? json_encode($body) : $body);

        return $this->response;
    }
}
