<?php

use App\service\ILogger;

/**
 * esc all string data for output
 *
 * @param   string  $str
 *
 * @return string
 */
function esc(string $str): string
{
    return empty($str) ? '' : htmlentities($str, ENT_QUOTES, 'UTF-8');
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
 * log event ,support both file and database logger
 *
 * @param   \App\service\ILogger  $logger
 * @param   string                $event
 *
 * @return void
 */
function logEvent(ILogger $logger, string $event): void
{
    if ( ! empty(trim($event))) {
        $logger->write($event);
    }
}
