<?php

// Front Controller

require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../model/User.php';
require __DIR__ . '/../model/Address.php';

// Security, filter user requests
$allowed = [
  'index',
  'about',
  'cats',
  'club',
  'error',
  'menu',
  'register',
  'register_process',
  'login_process',
  'profile',
  'error',
];

if (empty($_GET['p'])) {
    include __DIR__ . '/../controller/index.php';
} elseif (in_array($_GET['p'], $allowed, true)) {
    include __DIR__ . '/../controller/' . $_GET['p'] . '.php';
} else {
    go500(null);
}






