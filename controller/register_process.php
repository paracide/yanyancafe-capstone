<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    die('Please submit form');
}

//validate the form
$errors = [];
$errors = checkRequirement($errors);
$errors = checkPassword($errors);
$errors = checkName($errors, 'first_name');
$errors = checkName($errors, 'last_name');
$errors = checkEmail($errors, $conn);
$errors = checkPhone($errors);
$errors = checkPostalCode($errors);

//error go back to register
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
    $_SESSION['user_id'] = addUserProfile($conn, $_POST);
    FlashTools::success("You're registered successfully");
    header('Location: /?p=profile');
} catch (Exception $e) {
    FlashTools::error("Sorry,some errors happened");
    go404($e);
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
            $errors[$key][] = ucfirst($key) . " is a required field.";
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
    $password        = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if ($password !== $confirmPassword) {
        $error_msg                    = 'Password are not same.';
        $errors['password'] []        = $error_msg;
        $errors['confirm_password'][] = $error_msg;
    } elseif ( ! isPassword($password)) {
        $errors['password'] [] = 'Length should be between 8 to 20';
    }

    return $errors;
}

/**
 * check Name
 */
function checkName(array $errors, $key): array
{
    //password should be same
    if ( ! isName($_POST[$key])) {
        $errors[$key][] = "Should be letters and between 1 to 255 character";
    }

    return $errors;
}

/**
 * check Email
 */
function checkEmail(array $errors, PDO $conn): array
{
    $email = $_POST['email'];
    if ( ! isEmail($email)) {
        $errors['email'][] = "Should be in the format: example@example.com.";
    } else {
        $user = getUserByEmail($conn, $email);
        if (count($user) > 0) {
            $errors['email'][] = "This email has registered.";
        }
    }

    return $errors;
}

/**
 * check Phone
 */
function checkPhone(array $errors): array
{
    $phone = $_POST['phone'];
    if ( ! isPhone($phone)) {
        $errors['phone'][] = "Should be in the format: XXX-XXX-XXXX.";
    }

    return $errors;
}

/**
 * check Postal Code
 */
function checkPostalCode(array $errors): array
{
    if ( ! isCaPostalCode($_POST['postal_code'])) {
        $errors['postal_code'][] = "Should be in the format: A1A 1A1.";
    }

    return $errors;
}
