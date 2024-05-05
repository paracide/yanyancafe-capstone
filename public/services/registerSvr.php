<?php

require __DIR__.'/../../includes/config.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    die('Please submit form');
}

$errors = [];

$required = [
  "email",
  "password",
  "first_name",
  "last_name",
  "birthday",
  "phone",
  "gender",
  "subscribe_to_newsletter",
  "street",
  "province",
  "country",
  "city",
  "postal_code",
];

// Loop through $_POST to check for required values
foreach ($required as $key) {
    if (empty($_POST[$key])) {
        $errors[$key] = $errors[$key]."$key is a required field";
    }
}

if (count($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['post']   = $_POST;
    header('Location: ../register.php#reg');
    die;
}
