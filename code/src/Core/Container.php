<?php

namespace Moris\Code\Core;

use Moris\Code\Controllers\RelatedLinksController;
use Moris\Code\Database\Connection;
use Moris\Code\Exceptions\UnknownServiceException;
use Moris\Code\Services\RelatedLinks;
use Moris\Code\Services\Router;
use Symfony\Component\HttpFoundation\Response;

class Container
{
    public const host = 'mysql';
    public const username = 'parking';
    public const password = 'secret';
    public const dbname = 'parking';

    public static function get($name)
    {
        switch ($name) {
            case 'response':
                return new Response();
            case 'database':
                return new Connection(self::host, self::username, self::password, self::dbname);
            case 'api':
                return new RelatedLinks(self::get('database'));
            case 'controller':
                return new RelatedLinksController(self::get('api'), self::get('response'));
            case 'router':
                return new Router(self::get('controller'));
            default:
                throw new UnknownServiceException("Unknown service {$name}");
        }
    }
}
