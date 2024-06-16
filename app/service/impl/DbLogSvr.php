<?php

namespace App\service\impl;

use App\service\ILogger;
use PDO;

class DbLogSvr implements ILogger
{

    private static PDO $conn;

    private static ?DbLogSvr $instance = null;

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    public static function init(PDO $conn): void
    {
        self::$conn = $conn;
    }

    /**
     * Singleton pattern for make the service instance globally
     */
    public static function getInstance(): DbLogSvr
    {
        if (self::$instance === null) {
            self::$instance = new DbLogSvr();
        }

        return self::$instance;
    }

    /**
     * Write the event to the database
     *
     * @param $event
     *
     * @return int
     */
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

    /**
     * Get the last 10 log
     *
     * @return array
     */
    public function getLast(): array
    {
        $query = 'select * from log order by id desc limit 20;';

        $stmt = self::$conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}
