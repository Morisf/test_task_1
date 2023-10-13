<?php

namespace Moris\Code\Controllers;

use Moris\Code\Entity\EntityIteratorInterface;
use Moris\Code\Services\RelatedLinks;

class RelatedLinksController
{
    private RelatedLinks $relatedLinksDB;

    public function __construct($dbConnector)
    {
        $this->relatedLinksDB = $dbConnector;
    }

    public function fetchData($request): EntityIteratorInterface|array
    {
        if (!isset($request['domain'])) {
            http_response_code(400);
            return [
                'status' => false,
                'message' => 'Bad request, domain is required.',
            ];
        }

        $domain = htmlspecialchars($request['domain']);
        $limit = intval($request['number'] ?? 1);

        $relatedLinks = $this->relatedLinksDB->getRelatedLinks($domain, $limit);

        if (!$relatedLinks) {
            http_response_code(400);
        }

        return $relatedLinks->getList();
    }
}