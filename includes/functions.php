<?php

declare(strict_types=1);
/**
 * esc all string data for output
 *
 * @param   string  $str
 *
 * @return string
 */
function esc(string $str): string
{
    return htmlentities($str, ENT_QUOTES, 'UTF-8');
}

/**
 *  esc all string data without quotes for output
 *
 * @param   string  $str
 *
 * @return string
 */
function escHTML(string $str): string
{
    return htmlentities($str, ENT_NOQUOTES, 'UTF-8');
}

/**
 * debug single var
 *
 * @param          $var
 * @param   false  $die
 *
 * @return void
 */
function dd($var, $die = false): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($die) {
        exit();
    }
}

/**
 * check email format
 *
 * @param $email
 *
 * @return bool is email return true
 */
function isEmail(string $email): bool
{
    return (bool)filter_var(
      $email,
      FILTER_VALIDATE_EMAIL
    );
}

/**
 * check phone format
 *
 * @param $phone
 *
 * @return bool is phone return true
 */
function isPhone(string $phone): bool
{
    $phonePattern = '/^(\d{3})[-.\s]?(\d{3})[-.\s]?\d{4}$/';

    return (bool)preg_match($phonePattern, $phone);
}

/**
 * check postal code format
 *
 * @param $code
 *
 * @return bool is postal code return true
 */
function isCaPostalCode(string $code): bool
{
    $codePattern = '/^[A-Za-z]\d[A-Za-z][-\s]?\d[A-Za-z]\d$/';

    return (bool)preg_match($codePattern, $code);
}

/**
 * check name format
 *
 * @param $name
 *
 * @return bool is name return true
 */
function isName(string $name): bool
{
    $namePattern = '/^[A-Z][a-zA-Z]{1,255}$/';

    return (bool)preg_match($namePattern, $name);
}

/**
 * check password format
 *
 * @param $password
 *
 * @return bool is password return true
 */
function isPassword(string $password): bool
{
    $namePattern = '/^.{8,20}$/';

    return (bool)preg_match($namePattern, $password);
}

/**
 * check empty value
 *
 * @param $value
 *
 * @return mixed
 * @throws Exception
 */
function checkEmpty($value): mixed
{
    if (empty($value)) {
        throw new Exception('Value is empty');
    }

    return $value;
}

function view(string $view, array $data): void
{
    global $post;
    global $errors;
    extract($data);
    require_once __DIR__ . '/../view/' . $view . '.view.php';
}

function go404(?Exception $e): void
{
    if ( ! empty($e)) {
        error_log($e->getMessage());
    }
    http_response_code(404);
    header('Location:?p=error');
}
