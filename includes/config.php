<?php

declare(strict_types=1);

session_start();
ob_start();

$post   = $_SESSION['post'] ?? [];
$errors = $_SESSION['errors'] ?? [];
$flash  = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);
unset($_SESSION['errors']);
unset($_SESSION['post']);

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../tools/StringUtils.php';
require_once __DIR__ . '/../tools/Auth.php';
require_once __DIR__ . '/../tools/FlashUtils.php';
require_once __DIR__ . '/../tools/Router.php';
require_once __DIR__ . '/../tools/RegisterValidator.php';
require_once __DIR__ . '/../components/Flash.php';

const SITE_NAME = 'Yanyan Cafe';
