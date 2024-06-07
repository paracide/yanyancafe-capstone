<?php

namespace App\tools;

use App\constant\Constant;

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
     * login user and set user id in session after successful login
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
     * login user
     *
     * @param   string  $email
     * @param   string  $password
     *
     * @return array
     * @throws \Exception when user not found
     */
    public static function login(string $email, string $password): array
    {
        global $userRepository;
        $user = $userRepository->getUserByEmail($email);

        if (empty($user) || ! password_verify($password, $user['password'])) {
            return [];
        }

        return $user;
    }

    public static function loginFail(array $error, string $msg): void
    {
        $_SESSION['errors'] = $error;
        $_SESSION['post']   = $_POST;
        FlashUtils::error($msg);
        Router::fail(Router::login);
    }

}