<?php

namespace App\tools;

use Exception;

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
        global $logger;
        extract($data);
        logEvent($logger, LogUtils::success200());
        require_once __DIR__ . '/../../view/' . $view . '.view.php';
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
        global $logger;
        if ( ! empty($e)) {
            error_log($e->getMessage());
        }
        http_response_code(500);
        logEvent($logger, LogUtils::error500());
        self::go(self::error);
    }

    /**
     * redirect to page
     *
     * @param   Router  $router  router enum
     *
     * @return void
     */
    public static function go(Router $router): void
    {
        global $logger;
        logEvent($logger, LogUtils::success200());
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
        global $logger;
        http_response_code(405);
        logEvent($logger, LogUtils::error405());
        self::go(self::error);
    }

}
