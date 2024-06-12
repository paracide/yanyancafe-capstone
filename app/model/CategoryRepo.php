<?php

namespace App\model;

use App\interface\ISingleton;

/**
 * Category repository
 */
class CategoryRepo extends Repository implements ISingleton
{

    private static ?CategoryRepo $instance = null;

    protected string $table = "category";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): CategoryRepo
    {
        if (self::$instance === null) {
            self::$instance = new CategoryRepo();
        }

        return self::$instance;
    }


}

