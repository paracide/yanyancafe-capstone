<?php

namespace App\tools;

use App\constant\HttpStatus;
use Exception;

/**
 * Router Utils, redirect to view or page using specific enum router
 */
enum Router
{

    case index;
    case about;
    case cats;
    case cart;
    case checkout;
    case invoice;
    case club;
    case error;
    case menu;
    case menu_details;
    case register;
    case login;
    case register_process;
    case login_process;
    case logout_process;
    case cart_add_process;
    case cart_del_process;
    case cart_clear_process;
    case checkout_process;
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
        logEvent($logger, LogUtils::event200());
        require_once __DIR__ . '/../../view/' . $view . '.view.php';
    }

    public static function success(
      Router $router,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, HttpStatus::SUCCESS, $paramsString);
    }

    public static function fail(
      Router $router,
      ?HttpStatus $status = HttpStatus::INTERNAL_SERVER_ERROR,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, $status, $paramsString);
    }

    private static function redirect(
      Router $router,
      ?HttpStatus $status = HttpStatus::SUCCESS,
      ?string $paramsString = ''
    ): void {
        global $logger;
        logEvent($logger, LogUtils::getEvent($status));
        http_response_code($status->value);
        header("Location:/?p=$router->name$paramsString");
        die();
    }

    /**
     * redirect to 500 error page with optional exception
     *
     * @param   \App\constant\HttpStatus|null  $httpStatus
     * @param   Exception|null                 $e
     *
     * @return void
     */
    public static function errorPage(
      ?Exception $e,
      ?HttpStatus $httpStatus = HttpStatus::INTERNAL_SERVER_ERROR
    ): void {
        global $logger;
        if ( ! empty($e)) {
            error_log($e->getMessage());
        }
        self::success(self::error, $httpStatus);
    }

}
