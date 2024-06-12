<?php

declare(strict_types=1);

use App\constant\Constant;
use App\constant\LoggerType;
use App\interface\service\DatabaseLogger;
use App\interface\service\FileLogger;
use App\model\AddressRepo;
use App\model\CategoryRepo;
use App\model\MenuRepo;
use App\model\OrderDetailRepo;
use App\model\OrdersRepo;
use App\model\Repository;
use App\model\UserRepo;

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

//initiate the repositories
Repository::init($conn);
//set the logger type
const LOGGER_TYPE = LoggerType::database;
//initiate the logger according to the logger type
if (LOGGER_TYPE === LoggerType::file) {
    $resource = fopen(__DIR__ . '/../logs/event.log', 'a');
    FileLogger::init($resource);
    $logger = FileLogger::getInstance();
} elseif (LOGGER_TYPE === LoggerType::database) {
    DatabaseLogger::init($conn);
    $logger = DatabaseLogger::getInstance();
}

/**
 * service initiation
 * injection repositories dependencies globally
 * due to the config.php will be loaded on every page
 * so make the repositories singleton
 */
$addressRepo     = AddressRepo::getInstance();
$userRepo        = UserRepo::getInstance();
$menuRepo        = MenuRepo::getInstance();
$categoryRepo    = CategoryRepo::getInstance();
$orderDetailRepo = OrderDetailRepo::getInstance();
$ordersRepo      = OrdersRepo::getInstance();
