<?php

namespace App\interface\service;

use App\interface\ILogger;

class FileLogger implements ILogger
{

    private static $resource;

    public static function init($resource): void
    {
        self::$resource = $resource;
    }

    public function write($event)
    {
        // TODO: Implement write() method.
    }

}
