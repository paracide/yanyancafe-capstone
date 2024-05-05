<?php

session_start();
ob_start();

$post   = $_SESSION['post'] ?? [];
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
unset($_SESSION['post']);

require __DIR__.'/functions.php';
require __DIR__.'/credentials.php';
const SITE_NAME = 'Yanyan Cafe';
