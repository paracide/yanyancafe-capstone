<?php

declare(strict_types=1);
/**
 * esc all string data for output
 *
 * @param  string  $str
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
 * @param  string  $str
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
 * @param $var
 * @param  false  $die
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
 * @param $str
 *
 * @return string
 */
function raw($str): string
{
    return $str;
}

/**
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
 * @param $phone
 *
 * @return bool
 */
function isPhone(string $phone): bool
{
    $phonePattern = '/^(\d{3})[-.\s]?(\d{3})[-.\s]?\d{4}$/';

    return (bool)preg_match($phonePattern, $phone);
}

function isCaPostalCode(string $code): bool
{
    $codePattern = '/^[A-Za-z]\d[A-Za-z][-\s]?\d[A-Za-z]\d$/';

    return (bool)preg_match($codePattern, $code);
}
