<?php

global $userRepository;
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
    loginFail($error, 'Email and password are required');
}

$user = Auth::login($email, $password);
if (empty($user)) {
    $msg              = "Login credentials do not match our records";
    $error['email'][] = $msg;
    loginFail($error, $msg);
}

Auth::loginSuccess($user['id']);
$name = $user['first_name'] . ' ' . $user['last_name'];
FlashUtils::success("Welcome back! $name");
Router::go(Router::profile);

function loginFail(array $error, $msg): void
{
    $_SESSION['errors'] = $error;
    $_SESSION['post']   = $_POST;
    FlashUtils::error($msg);
    Router::go(Router::login);
}

