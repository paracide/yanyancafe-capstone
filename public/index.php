<?php

// Front Controller

global $logger, $fileLogger;
use App\tools\Auth;
use App\tools\Router;

require __DIR__ . '/../config/config.php';

$allowed       = array_map(fn($router) => $router->name, Router::cases());
$authenticated = [
  Router::checkout_process,
  Router::checkout,
  Router::orders,
  Router::invoice,
];
$authenticated = array_map(fn($item) => $item->name, $authenticated);

$page = $_REQUEST['p'] ?? '';
if (empty($page)) {
    include __DIR__ . '/../app/controller/index.php';
} elseif (in_array($page, $allowed, true)) {
    if (in_array($page, $authenticated, true)) {
        Auth::checkLoggedIn();
    }

    if (str_ends_with($page, "process")) {
        include __DIR__ . '/../app/controller/api/' . $page . '.php';
    } else {
        include __DIR__ . '/../app/controller/' . $page . '.php';
    }
} else {
    Router::errorPage();
}






