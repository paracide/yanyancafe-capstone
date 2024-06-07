<?php

namespace App\tools;

use App\constant\HttpStatus;

class LogUtils
{

    public static function event200(): string
    {
        return self::getEvent();
    }


    public static function getEvent(
      ?HttpStatus $status = HttpStatus::SUCCESS
    ): string {
        date_default_timezone_set('America/Winnipeg');

        $date          = date('Y-m-d H:i:s');
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri    = $_SERVER['REQUEST_URI'];
        $userAgent     = $_SERVER['HTTP_USER_AGENT'];

        return "$date | $requestMethod | $requestUri | $status->value | $userAgent";
    }

}