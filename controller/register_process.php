<?php

checkPostRequest();

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

$validator = new RegisterValidator();
$validator->checkRequired($require, $_POST);
$validator->checkPassword($_POST['password'], $_POST['confirm_password']);
$validator->checkName($_POST['first_name'], 'First Name');
$validator->checkName($_POST['last_name'], 'Last Name');
$validator->checkEmail($_POST['email']);
$validator->checkPhone($_POST['phone']);
$validator->checkPostalCode($_POST['postal_code']);

//error go back to register
$errors = $validator->getErrors();
if (count($errors)) {
    $resultError = [];
    foreach ($errors as $key => $messages) {
        $errorMessages = '';
        foreach ($messages as $msg) {
            $errorMessages .= ' ' . $msg . ' ';
        };
        $resultError[$key] = $errorMessages;
    }
    $_SESSION['errors'] = $resultError;
    $_SESSION['post']   = $_POST;
    header('Location: /?p=register');
    die();
}

//register succeed go to profile
try {
    $_SESSION['user_id'] = addUserProfile( $_POST);
    FlashTools::success("You're registered successfully");
    header('Location: /?p=profile');
} catch (Exception $e) {
    FlashTools::error("Sorry,some errors happened");
    go500($e);
}
die();


