<?php

namespace App\controller\api;

global $userRepo, $logger;
use App\constant\Constant;
use App\tools\Auth;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;
use App\tools\Validator;

/**
 * This controller is used to process login
 * return to profile page
 */
Preconditions::checkPostRequest();

$email    = $_POST['email'];
$password = $_POST['password'];

/**
 * Validate the form
 */
$validator = new Validator();
$validator->checkEmail($email);
$validator->checkEmpty($password, "password");
$error = $validator->getError();
if (count($error)) {
    Auth::loginFail($error, 'Email and password are required');
}

/**
 * Check login credentials
 */
$user = Auth::login($email, $password);
if (empty($user)) {
    $msg              = "Login credentials do not match our records";
    $error['email'][] = $msg;
    Auth::loginFail($error, $msg);
}

/**
 * Login success save user id to session
 * if redirect uri is set redirect to that page else redirect to profile page
 */
Auth::loginSuccess($user['id']);
$name = $user['first_name'] . ' ' . $user['last_name'];
FlashUtils::success("Welcome back! $name");
$redirect = $_SESSION[Constant::SESSION_AUTH_REDIRECT_URI];
if ($redirect) {
    unset($_SESSION[Constant::SESSION_AUTH_REDIRECT_URI]);
    header("Location:$redirect");
    die();
} else {
    Router::success(Router::profile);
}

