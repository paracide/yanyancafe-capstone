<?php

declare(strict_types=1);

session_start();
ob_start();

$post   = $_SESSION['post'] ?? [];
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
unset($_SESSION['post']);

require_once __DIR__.'/functions.php';
require_once __DIR__.'/credentials.php';
const SITE_NAME = 'Yanyan Cafe';
