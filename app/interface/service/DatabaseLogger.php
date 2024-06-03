<?php

namespace App\interface\service;

use App\interface\ILogger;
use PDO;

class DatabaseLogger implements ILogger
{

    private static PDO $conn;

    public static function init(PDO $conn): void
    {
        self::$conn = $conn;
    }

    public function write($event): int
    {
        $event = trim($event);
        if ( ! empty($event)) {
            $query = 'INSERT INTO log (event) VALUES (:event)';

            $stmt = self::$conn->prepare($query);
            $stmt->bindValue(":event", $event);
            $stmt->execute();

            return intval(self::$conn->lastInsertId());
        }

        return 0;
    }

}
