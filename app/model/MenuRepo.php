<?php

namespace App\model;

use App\interface\ISingleton;
use App\tools\Preconditions;

class MenuRepo extends Repository implements ISingleton
{

    private static ?MenuRepo $instance = null;

    protected string $table = "menu";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): MenuRepo
    {
        if (self::$instance === null) {
            self::$instance = new MenuRepo();
        }

        return self::$instance;
    }

}

