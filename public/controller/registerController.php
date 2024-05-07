<?php

require_once __DIR__.'/../../includes/config.php';
require_once __DIR__.'/../../includes/services/UserService.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    die('Please submit form');
}

$errors = [];
$errors = checkRequirement($errors);
$errors = checkPassword($errors);
$errors = checkEmail($errors, $conn);
$errors = checkPhone($errors);
$errors = checkPostalCode($errors);

//error go back to register
if (count($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['post']   = $_POST;
    header('Location: ../register.php#reg');
    die();
}

//register succeed go to profile
try {
    $_SESSION['user_id'] = addUserProfile($conn, $_POST);
    header('Location: ../profile.php');
} catch (Exception $e) {
    error_log($e->getMessage());
    header('Location: ../error.php');
}
die();

/**
 * check all required fields
 */
function checkRequirement(array $errors): array
{
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

    // validate the require_onced
    foreach ($require as $key) {
        if (empty($_POST[$key])) {
            $errors[$key] = ucfirst($key)." is a required field";
        }
    }

    return $errors;
}

/**
 * check Password
 */
function checkPassword(array $errors): array
{
    //password should be same
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $error_msg                  = 'Password are not same';
        $errors['password']         = $error_msg;
        $errors['confirm_password'] = $error_msg;
    }

    return $errors;
}

function checkEmail(array $errors, PDO $conn): array
{
    $email = $_POST['email'];
    if (empty($errors['email']) && ! isEmail($email)) {
        $errors['email'] = "Address should be in the format: example@example.com";
    } else {
        $user = getUserByEmail($conn, $email);
        if (count($user) > 0) {
            $errors['email'] = "This email has registered";
        }
    }

    return $errors;
}

function checkPhone(array $errors): array
{
    if (empty($errors['phone']) && ! isPhone($_POST['phone'])) {
        $errors['phone'] = "Phone should be in the format: XXX-XXX-XXXX";
    }

    return $errors;
}

function checkPostalCode(array $errors): array
{
    if (empty($errors['postal_code']) && ! isCaPostalCode(
        $_POST['postal_code']
      )) {
        $errors['postal_code'] = "Postal code should be in the format: A1A 1A1";
    }

    return $errors;
}
