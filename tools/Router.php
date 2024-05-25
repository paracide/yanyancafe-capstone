<?php

/**
 * Router Utils, redirect to view or page using specific enum router
 */
enum Router
{
    case profile;
    case register;
    case login;
    case error;

    /**
     * redirect to view
     * @param   string  $view view name
     * @param   array   $data data to pass to view
     *
     * @return void
     */
    public static function view(string $view, array $data): void
    {
        global $post;
        global $errors;
        extract($data);
        require_once __DIR__ . '/../view/' . $view . '.view.php';
    }

    /**
     * redirect to page
     * @param   Router  $router router enum
     *
     * @return void
     */
    public static function go(Router $router): void
    {
        header("Location:?p=$router->name");
        die();
    }

    /**
     * redirect to 500 error page with optional exception
     *
     * @param   Exception|null  $e
     *
     * @return void
     */
    public static function go500(?Exception $e): void
    {
        if ( ! empty($e)) {
            error_log($e->getMessage());
        }
        http_response_code(500);
        self::go(self::error);
    }

    /**
     * redirect to 404 error page
     * @return void
     */
    public static function go405(): void
    {
        http_response_code(500);
        self::go(self::error);
    }



}
