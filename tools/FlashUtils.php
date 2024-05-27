<?php

/**
 * Flash utils
 */
class FlashUtils
{

    /**
     * set flash message
     * @param   string  $msg message
     *
     * @return void
     */
    public static function success(string $msg): void
    {
        $_SESSION['flash']['success'] = $msg;
    }

    /**
     * set flash message
     * @param   string  $msg message
     *
     * @return void
     */
    public static function error(string $msg): void
    {
        $_SESSION['flash']['error'] = $msg;
    }

}
