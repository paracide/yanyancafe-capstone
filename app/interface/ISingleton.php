<?php

namespace App\interface;

interface ISingleton
{

    /**
     * Singleton pattern for make the service instance globally
     */
    public static function getInstance();

}
