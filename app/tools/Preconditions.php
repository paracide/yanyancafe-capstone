<?php

namespace App\tools;

use Exception;

/**
 * Preconditions utils
 */
class Preconditions
{

    /**
     * check empty value, throw exception if empty, return value if not
     *
     * @param $value
     *
     * @return mixed
     * @throws Exception
     */
    public static function checkEmpty($value): mixed
    {
        if (empty($value)) {
            throw new Exception('Value is empty');
        }

        return $value;
    }

    /**
     * check the request method is POST, redirect to 405 error page if not
     *
     * @return void
     */
    public static function checkPostRequest(): void
    {
        if ('POST' !== $_SERVER['REQUEST_METHOD']) {
            Router::go405();
        }
    }

}
