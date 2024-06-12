<?php

namespace App\constant;

/**
 * HttpStatus class
 *
 */
enum HttpStatus: int
{

    case SUCCESS = 200;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case INTERNAL_SERVER_ERROR = 500;

}
