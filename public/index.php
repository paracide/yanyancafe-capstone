<?php

// Front Controller

global $logger, $fileLogger;
use App\tools\LogUtils;
use App\tools\Router;

require __DIR__ . '/../config/config.php';

$allowed = array_map(fn($router) => $router->name, Router::cases());
$page    = $_REQUEST['p'] ?? '';
if (empty($page)) {
    $event = LogUtils::success200();
    logEvent($logger, $event);
    include __DIR__ . '/../app/controller/index.php';
} elseif (in_array($page, $allowed, true)) {
    $event = LogUtils::success200();
    logEvent($logger, $event);
    include __DIR__ . '/../app/controller/' . $page . '.php';
} else {
    $event = LogUtils::error500();
    logEvent($logger, $event);
    Router::go500(null);
}






