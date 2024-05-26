<?php

global $userRepository;
Preconditions::checkPostRequest();

$email    = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
    FlashUtils::error("Email and password are required");
    Router::go(Router::club);
}

$user = $userRepository->getUserByEmail($email);
if (empty($user) || ! password_verify($password, $user['password'])) {
    FlashUtils::error("Login credentials do not match our records");
    Router::go(Router::club);
}

Auth::login($user['id']);
FlashUtils::success("You have successfully logged in");
Router::go(Router::profile);



