<?php

// Front Controller

require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../model/User.php';
require __DIR__ . '/../model/Address.php';

$allowed = array_map(fn($router) => $router->name, Router::cases());

if (empty($_GET['p'])) {
    include __DIR__ . '/../controller/index.php';
} elseif (in_array($_GET['p'], $allowed, true)) {
    include __DIR__ . '/../controller/' . $_GET['p'] . '.php';
} else {
    Router::go500(null);
}






