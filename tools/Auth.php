<?php

/**
 * Auth utils
 */
class Auth
{

    /**
     * check if user is logged in
     *
     * @return bool
     */
    public static function check(): bool
    {
        return ! empty($_SESSION[Constant::SESSION_USER_ID]);
    }

    /**
     * login user and set user id in session
     *
     * @param   int  $userId
     *
     * @return void
     */
    public static function login(int $userId): void
    {
        session_regenerate_id();
        $_SESSION[Constant::SESSION_USER_ID] = $userId;
    }

    /**
     * logout user and remove user id from session
     *
     * @return void
     */
    public static function logout(): void
    {
        unset($_SESSION[Constant::SESSION_USER_ID]);
        session_regenerate_id();
    }

}
