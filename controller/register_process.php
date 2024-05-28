<?php

global $userRepository;
Preconditions::checkPostRequest();

//validate the form
$require = [
  "email",
  "password",
  "confirm_password",
  "first_name",
  "last_name",
  "birthday",
  "phone",
  "street",
  "province",
  "country",
  "city",
  "postal_code",
];

$validator = new Validator();
$validator->checkRequired($require, $_POST);
$validator->checkPassword($_POST['password'], $_POST['confirm_password']);
$validator->checkName($_POST['first_name'], 'First Name');
$validator->checkName($_POST['last_name'], 'Last Name');
$validator->checkUniqueEmail($_POST['email']);
$validator->checkPhone($_POST['phone']);
$validator->checkPostalCode($_POST['postal_code']);

//error go back to register
$errors = $validator->getError();
if (count($errors)) {
    $resultError        = array_map(function ($msg) {
        return implode(" ", $msg);
    }, $errors);
    $_SESSION['errors'] = $resultError;
    $_SESSION['post']   = $_POST;
    Router::go(Router::register);
}

//register succeed go to profile
try {
    $userId         = $userRepository->addUserProfile($_POST);
    Auth::loginSuccess($userId);
    FlashUtils::success("You're registered successfully");
    Router::go(Router::profile);
} catch (Exception $e) {
    FlashUtils::error("Sorry,some errors happened");
    Router::go500($e);
}
die();


