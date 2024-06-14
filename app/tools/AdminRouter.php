<?php

namespace App\tools;

use App\constant\HttpStatus;
use Exception;

/**
 * Router Utils, redirect to view or page using specific enum router
 */
enum AdminRouter
{

    case index;
    case menu;
    case menu_del_process;
    case menu_edit;
    case menu_add;
    case menu_add_process;
    case menu_edit_process;
    case error;

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
        require_once __DIR__ . '/../../view-admin/' . $view
                     . '.view.php';
    }

    public static function success(
      AdminRouter $router,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, HttpStatus::SUCCESS, $paramsString);
    }

    public static function fail(
      AdminRouter $router,
      ?HttpStatus $status = HttpStatus::INTERNAL_SERVER_ERROR,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, $status, $paramsString);
    }

    private static function redirect(
      AdminRouter $router,
      ?HttpStatus $status = HttpStatus::SUCCESS,
      ?string $paramsString = ''
    ): void {
        global $logger;
        logEvent($logger, LogUtils::getEvent($status));
        http_response_code($status->value);
        header("Location:/admin?p=$router->name$paramsString");
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
        self::fail(self::error, $httpStatus);
    }

}
