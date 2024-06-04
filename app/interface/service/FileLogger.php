<?php

namespace App\interface\service;

use App\interface\ILogger;

class FileLogger implements ILogger
{

    private static $resource;

    private static ?FileLogger $instance = null;

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the service instance globally
     */
    public static function getInstance(): FileLogger
    {
        if (self::$instance === null) {
            self::$instance = new FileLogger();
        }

        return self::$instance;
    }

    public static function init($resource): void
    {
        self::$resource = $resource;
    }

    public function write($event): void
    {
        $event = trim($event);
        if ( ! empty($event)) {
            fwrite(self::$resource, $event . PHP_EOL);
        }
    }

}
