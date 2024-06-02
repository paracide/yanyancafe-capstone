<?php

namespace interface\service;

use interface\ILogger;

class DatabaseLogger implements ILogger
{

    private static \PDO $conn;

    public static function init(\PDO $conn)
    {
        self::$conn = $conn;
    }

    public function write($event) {}

}
