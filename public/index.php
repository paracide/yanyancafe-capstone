<?php

// Front Controller

use App\tools\Router;

require __DIR__ . '/../config/config.php';

$allowed = array_map(fn($router) => $router->name, Router::cases());
$page    = $_REQUEST['p'] ?? '';
if (empty($page)) {
    include __DIR__ . '/../app/controller/index.php';
} elseif (in_array($page, $allowed, true)) {
    include __DIR__ . '/../app/controller/' . $page . '.php';
} else {
    Router::go500(null);
}






