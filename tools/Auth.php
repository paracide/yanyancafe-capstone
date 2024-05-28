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
    public static function isLoggedIn(): bool
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
    public static function loginSuccess(int $userId): void
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

    /**
     * @throws
     */
    public static function login($email, $password): array
    {
        global $userRepository;
        $user = $userRepository->getUserByEmail($email);

        if (empty($user) || password_verify($password, $user['password'])) {
            return [];
        }

        return $user;
    }

}
