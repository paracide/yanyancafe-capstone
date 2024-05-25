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

function go500(?Exception $e): void
{
    if ( ! empty($e)) {
        error_log($e->getMessage());
    }
    http_response_code(500);
    header('Location:?p=error');
}

function checkPostRequest()
{
    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        go405();
    }
}

function go405()
{
    http_response_code(500);
    header('Location:?p=error');
}
