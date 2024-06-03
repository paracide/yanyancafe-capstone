<?php

declare(strict_types=1);

use App\interface\service\DatabaseLogger;
use App\interface\service\FileLogger;
use App\model\AddressRepository;
use App\model\Repository;
use App\model\UserRepository;
use App\tools\Constant;

session_start();
ob_start();

require_once __DIR__ . '/../vendor/autoload.php';

$post   = $_SESSION[Constant::SESSION_POST] ?? [];
$errors = $_SESSION[Constant::SESSION_ERRORS] ?? [];
$flash  = $_SESSION[Constant::SESSION_FLASH] ?? [];
unset($_SESSION[Constant::SESSION_POST]);
unset($_SESSION[Constant::SESSION_ERRORS]);
unset($_SESSION[Constant::SESSION_FLASH]);

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/credentials.php';

const SITE_NAME = 'Yanyan Cafe';

//database config
$conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//logger config
Repository::init($conn);
DatabaseLogger::init($conn);
$resource = fopen(__DIR__ . '/../logs/event.log', 'w');
FileLogger::init($resource);

/**
 * service initiation
 * injection repositories dependencies globally
 * due to the config.php will be loaded on every page
 * so make the repositories singleton
 */
$addressRepository = AddressRepository::getInstance();
$userRepository    = UserRepository::getInstance();
$databaseLogger    = DatabaseLogger::getInstance();
$fileLogger        = FileLogger::getInstance();
