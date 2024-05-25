<?php

enum Router: string
{

    case profile = 'profile';
    case register = 'register';
    case login = 'login';
    case error = 'error';

    public static function header(Router $router)
    {
        header("Location:?p=$router->value");
        die();
    }

    public static function go500(?Exception $e): void
    {
        if ( ! empty($e)) {
            error_log($e->getMessage());
        }
        http_response_code(500);
        header('Location:?p=error');
    }

    public static function go405(): void
    {
        http_response_code(500);
        header('Location:?p=error');
    }

}
