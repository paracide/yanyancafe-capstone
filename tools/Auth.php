<?php

class Auth
{
    public static function check(): bool
    {
        return ! empty($_SESSION[Constant::SESSION_USER_ID]);
    }

    public static function login(int $userId): void
    {
        session_regenerate_id(true);
        $_SESSION[Constant::SESSION_USER_ID] = $userId;
    }

    public static function logout(): void
    {
        unset($_SESSION[Constant::SESSION_USER_ID]);
        session_regenerate_id(true);
    }

}
