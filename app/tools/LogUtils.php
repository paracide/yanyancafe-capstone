<?php

namespace App\tools;

class LogUtils
{

    public static function success200(): string
    {
        return self::generateEvent(200);
    }

    public static function error500(): string
    {
        return self::generateEvent(500);
    }

    public static function error405(): string
    {
        return self::generateEvent(405);
    }

    public static function generateEvent(string $statusCode): string
    {
        $date          = date('Y-m-d H:i:s');
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri    = $_SERVER['REQUEST_URI'];
        $userAgent     = $_SERVER['HTTP_USER_AGENT'];

        return "$date | $requestMethod | $requestUri | $statusCode | $userAgent";
    }

}
