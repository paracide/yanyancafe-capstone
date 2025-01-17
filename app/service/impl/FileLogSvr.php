<?php

namespace App\service\impl;

use App\service\ILogger;

class FileLogSvr implements ILogger
{

    private static $resource;

    private static ?FileLogSvr $instance = null;

    /**
     * For singleton pattern, the constructor is private to avoid new instance
     */
    private function __construct() {}

    /**
     * Singleton pattern for make the service instance globally
     */
    public static function getInstance(): FileLogSvr
    {
        if (self::$instance === null) {
            self::$instance = new FileLogSvr();
        }

        return self::$instance;
    }

    /**
     * Initiate the resource for file logger
     *
     * @param $resource
     */
    public static function init($resource): void
    {
        self::$resource = $resource;
    }

    /**
     * Write the event to the file
     *
     * @param $event
     */
    public function write($event): void
    {
        $event = trim($event);
        if ( ! empty($event)) {
            fwrite(self::$resource, $event . PHP_EOL);
        }
    }

    //todo: implement the method next assignment
    public function getLast(): array
    {
        return [];
    }

}
