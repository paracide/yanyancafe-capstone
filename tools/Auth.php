<?php

class Auth
{

    public static function check(): bool
    {
        return ! empty($_SESSION['user_id']);
    }

    public static function login(int $userId): void
    {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $userId;
    }

    public static function logout(): void
    {
        unset($_SESSION['user_id']);
        session_regenerate_id(true);
    }

}
