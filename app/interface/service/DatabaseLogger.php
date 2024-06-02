<?php

namespace App\interface\service;

use App\interface\ILogger;

class DatabaseLogger implements ILogger
{

    private static \PDO $conn;

    public static function init(\PDO $conn)
    {
        self::$conn = $conn;
    }

    public function write($event) {}

}
