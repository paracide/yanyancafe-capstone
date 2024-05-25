<?php

enum Router
{

    case profile;
    case register;
    case login;
    case error;

    public static function view(string $view, array $data): void
    {
        global $post;
        global $errors;
        extract($data);
        require_once __DIR__ . '/../view/' . $view . '.view.php';
    }

    public static function go(Router $router): void
    {
        header("Location:?p=$router->name");
        die();
    }

    public static function go500(?Exception $e): void
    {
        if ( ! empty($e)) {
            error_log($e->getMessage());
        }
        http_response_code(500);
        self::go(self::error);
    }

    public static function go405(): void
    {
        http_response_code(500);
        self::go(self::error);
    }



}
