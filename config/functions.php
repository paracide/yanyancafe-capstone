<?php

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
