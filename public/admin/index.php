<?php

// Backend Controller

global $logger, $fileLogger;
use App\tools\AdminRouter;
use App\tools\Auth;

require __DIR__ . '/../../config/adminConfig.php';

$allowed = array_map(fn($router) => $router->name, AdminRouter::cases());

$adminPage = $_REQUEST['p'] ?? '';
    Auth::checkLoggedIn();

    Auth::checkAdmin();
$adminPath = __DIR__ . '/../../app/admin/';

if (empty($adminPage)) {
    include $adminPath . 'index.php';
} elseif (in_array($adminPage, $allowed, true)) {
    if (str_ends_with($adminPage, "process")) {
        include "$adminPath/api/$adminPage.php";
    } else {
        include "$adminPath/$adminPage.php";
    }
} else {
    AdminRouter::errorPage(null);
}






