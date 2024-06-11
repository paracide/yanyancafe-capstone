<?php

namespace App\model;

use App\interface\ISingleton;

class OrderRepo extends Repository implements ISingleton
{

    private static ?OrderRepo $instance = null;

    protected string $table = "order";

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the repository instance globally
     */
    public static function getInstance(): OrderRepo
    {
        if (self::$instance === null) {
            self::$instance = new OrderRepo();
        }

        return self::$instance;
    }

    public function newOrder(array $cart) {



    }

}

