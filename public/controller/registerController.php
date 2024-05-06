<?php

require_once __DIR__.'/../../includes/config.php';
require_once __DIR__.'/../../includes/services/UserService.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    die('Please submit form');
}

$errors = [];

$require_onced = [
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

// validate the require_onced
foreach ($require_onced as $key) {
    if (empty($_POST[$key])) {
        $errors[$key] = ucfirst($key)." is a require_onced field";
    }
}

//validate email
if (empty($errors['email']) && ! isEmail($_POST['email'])) {
    $errors['email'] = "Address should be in the format: example@example.com";
}

//validate phone
if (empty($errors['phone']) && ! isPhone($_POST['phone'])) {
    $errors['phone'] = "Phone should be in the format: XXX-XXX-XXXX";
}

//validate phone
if (empty($errors['postal_code']) && ! isCaPostalCode($_POST['postal_code'])) {
    $errors['postal_code'] = "Postal code should be in the format: A1A 1A1";
}

if (count($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['post']   = $_POST;
    header('Location: ../register.php#reg');
    die;
}

try {
    $userId = addUser($conn, $_POST);
    header('Location: ../register.php#reg');
} catch (Exception $e) {
    error_log($e->getMessage());
    header('Location: ../error.php');
}

