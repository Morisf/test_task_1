<?php

namespace Moris\Code\Controllers;

use Moris\Code\Services\RelatedLinks;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RelatedLinksController extends AbstractController
{
    public function __construct(
        private readonly RelatedLinks $relatedLinksDB,
        Response $response
    ) {
        parent::__construct($response);
    }

    public function fetchData(Request $request): Response
    {
        $domain = $request->get('domain');
        $limit = (int) $request->get('number', 1);

        if (!$domain) {
            return $this->render(
                [
                    'status' => false,
                    'message' => 'Bad request, domain is required.',
                ],
                ResponseContentType::HTML_RESPONSE_CONTENT_TYPE,
                400
            );
        }

        $relatedLinks = $this->relatedLinksDB->getRelatedLinks($domain, $limit);

        $list = $relatedLinks->getList();

        if (!$list) {
            return $this->render($list, Response::HTTP_NOT_FOUND);
        }

        return $this->render($list);
    }
}
