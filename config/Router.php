<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Router Utils, redirect to view or page using specific enum router
 */
enum Router
{

    case index;
    case about;
    case cats;
    case club;
    case error;
    case menu;
    case register;
    case login;
    case register_process;
    case login_process;
    case logout_process;
    case profile;

    /**
     * redirect to view
     *
     * @param   string  $view  view name
     * @param   array   $data  data to pass to view
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
     * redirect to page
     *
     * @param   Router  $router  router enum
     *
     * @return void
     */
    #[NoReturn] public static function go(Router $router): void
    {
        header("Location:/?p=$router->name");
        die();
    }

    /**
     * error method request
     *
     * @return void
     */
    public static function go405(): void
    {
        http_response_code(405);
        self::go(self::error);
    }

}
