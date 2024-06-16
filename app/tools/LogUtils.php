<?php

namespace App\tools;

use App\constant\HttpStatus;

class LogUtils
{

    /**
     * get success event log string
     *
     * @return string
     */
    public static function getSuccessLog(): string
    {
        return self::getLog();
    }

    /**
     * get event log string
     *
     * @param   \App\constant\HttpStatus|null  $status
     *
     * @return string
     */
    public static function getLog(
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
