<?php

require __DIR__.'/../../includes/config.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    die('Please submit form');
}

$errors = [];

$required = [
  "email",
  "password",
  "confirm_password",
  "first_name",
  "last_name",
  "birthday",
  "phone",
  "subscribe_to_newsletter",
  "street",
  "province",
  "country",
  "city",
  "postal_code",
];

// validate the required
foreach ($required as $key) {
    if (empty($_POST[$key])) {
        $errors[$key] = ucfirst($key)." is a required field";
    }
}

if (empty($errors['email']) && ! filter_var(
    $_POST['email'],
    FILTER_VALIDATE_EMAIL
  )) {
    $errors['email'] = "Enter a valid address in the format example@example.com";
}

if (count($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['post']   = $_POST;
    header('Location: ../register.php#reg');
    die;
}
