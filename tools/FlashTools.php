<?php

class FlashTools
{

    public static function success(string $msg): void
    {
        $_SESSION['flash']['success'] = $msg;
    }

    public static function error(string $msg): void
    {
        $_SESSION['flash']['error'] = $msg;
    }

}
