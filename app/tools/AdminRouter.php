<?php

namespace App\tools;

use App\constant\HttpStatus;
use Exception;

/**
 * Admin Router Utils, redirect to view or page using specific enum router
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
    case user;
    case orders;

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
        logEvent($logger, LogUtils::getSuccessLog());
        require_once __DIR__ . '/../../view/admin/' . $view
                     . '.view.php';
    }

    public static function success(
      AdminRouter $router,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, HttpStatus::SUCCESS, $paramsString);
    }

    private static function redirect(
      AdminRouter $router,
      ?HttpStatus $status = HttpStatus::SUCCESS,
      ?string $paramsString = ''
    ): void {
        global $logger;
        logEvent($logger, LogUtils::getLog($status));
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

    /**
     * redirect to page with error status
     *
     * @param   \App\tools\AdminRouter         $router
     * @param   \App\constant\HttpStatus|null  $status
     * @param   string|null                    $paramsString
     *
     * @return void
     */
    public static function fail(
      AdminRouter $router,
      ?HttpStatus $status = HttpStatus::INTERNAL_SERVER_ERROR,
      ?string $paramsString = ''
    ): void {
        self::redirect($router, $status, $paramsString);
    }

    /**
     * redirect to page with error status, mostly used for form submit
     *
     * @param   array                   $errors
     * @param   \App\tools\AdminRouter  $router
     * @param   string|null             $param
     *
     * @return void
     */
    public static function checkFormError(
      array $errors,
      AdminRouter $router,
      ?string $param = null
    ): void {
        if (count($errors)) {
            $resultError        = array_map(function ($msg) {
                return implode(" ", $msg);
            }, $errors);
            $_SESSION['errors'] = $resultError;
            $_SESSION['post']   = $_POST;
            AdminRouter::fail($router, $param);
        }
    }

}
