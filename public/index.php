<?php

// Front Controller

require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../model/user.model.php';
require __DIR__ . '/../model/address.model.php';

// Security, filter user requests
$allowed = [
  'about',
  'cats',
  'club',
  'error',
  'menu',
  'register',
  'register_process',
  'profile',
];

if (empty($_GET['p'])) {
    include __DIR__ . '/../controller/index.php';
} elseif (in_array($_GET['p'], $allowed, true)) {
    include __DIR__ . '/../controller/' . $_GET['p'] . '.php';
} else {
    // set 404 error in header
    http_response_code(404);
    header('Location: error.php');
    die();
}





