<?php

namespace Moris\Code\Core;

use Moris\Code\Database\Connection;
use Moris\Code\Services\RelatedLinks;
use Moris\Code\Controllers\RelatedLinksController;
use Moris\Code\Services\Router;

class Container
{
    const host = "mysql";
    const username = "parking";
    const password = "secret";
    const dbname = "parking";

    public static function get($name)
    {
        switch ($name) {
            case 'database':
                return new Connection(self::host, self::username, self::password, self::dbname);
            case 'api':
                return new RelatedLinks(self::get('database'));
            case 'controller':
                return new RelatedLinksController(self::get('api'));
            case 'router':
                return new Router(self::get('controller'));
            default:
                throw new \Exception("Unknown service {$name}");
        }
    }
}