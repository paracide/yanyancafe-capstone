<?php

global $userRepo, $logger;
use App\constant\Constant;
use App\tools\Auth;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;
use App\tools\Validator;

Preconditions::checkPostRequest();

$email    = $_POST['email'];
$password = $_POST['password'];

$validator = new Validator();
$validator->checkEmail($email);
$validator->checkEmpty($password, "password");
$error = $validator->getError();
if (count($error)) {
    Auth::loginFail($error, 'Email and password are required');
}

$user = Auth::login($email, $password);
if (empty($user)) {
    $msg              = "Login credentials do not match our records";
    $error['email'][] = $msg;
    Auth::loginFail($error, $msg);
}

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

