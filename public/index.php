<?php

// Front Controller

require __DIR__ . '/../includes/config.php';

$allowed = array_map(fn($router) => $router->name, Router::cases());
$page    = $_REQUEST['p'] ?? '';
if (empty($page)) {
    include __DIR__ . '/../controller/index.php';
} elseif (in_array($page, $allowed, true)) {
    include __DIR__ . '/../controller/' . $page . '.php';
} else {
    Router::go500(null);
}






