<?php

namespace Moris\Code\Database;

class Connection
{
    private $conn;

    public function __construct(string $host, string $username, string $password, string $dbname, int $port = 3306)
    {
        $this->conn = new \mysqli($host, $username, $password, $dbname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function conn(): \mysqli
    {
        return $this->conn;
    }
}