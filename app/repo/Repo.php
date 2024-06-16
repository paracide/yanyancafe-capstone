<?php

namespace App\repo;

use PDO;

abstract class Repo
{

    protected static PDO $conn;

    /**
     * init connection globally
     *
     * @param   \PDO  $conn
     *
     * @return void
     */
    public static function init(PDO $conn): void
    {
        self::$conn = $conn;
    }

}
