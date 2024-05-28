<?php

global $userRepository;
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
FlashUtils::success("You have successfully logged in");
Router::go(Router::profile);

function loginFail(array $error, $msg): void
{
    $_SESSION['errors'] = $error;
    $_SESSION['post']   = $_POST;
    FlashUtils::error($msg);
    Router::go(Router::login);
}

