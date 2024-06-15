<?php

namespace App\service;

interface ISingleton
{

    /**
     * Singleton pattern for make the service instance globally
     */
    public static function getInstance();

}
