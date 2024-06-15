<?php

declare(strict_types=1);

use App\constant\Constant;
use App\constant\LoggerType;
use App\repo\AddressRepo;
use App\repo\CategoryRepo;
use App\repo\FileRepo;
use App\repo\MenuRepo;
use App\repo\ModelRepo;
use App\repo\OrderDetailRepo;
use App\repo\OrdersRepo;
use App\repo\OverviewRepo;
use App\repo\UserRepo;
use App\service\impl\DbLogSvr;
use App\service\impl\FileLogSvr;

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

const SITE_NAME = 'Yanyan Cafe Admin';

//database config
$conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//initiate the repositories
ModelRepo::init($conn);

//set the logger type
const LOGGER_TYPE = LoggerType::database;
//initiate the logger according to the logger type
if (LOGGER_TYPE === LoggerType::file) {
    $resource = fopen(__DIR__ . '/../storage/logs/event.log', 'a');
    FileLogSvr::init($resource);
    $logger = FileLogSvr::getInstance();
} elseif (LOGGER_TYPE === LoggerType::database) {
    DbLogSvr::init($conn);
    $logger = DbLogSvr::getInstance();
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
$fileRepo        = FileRepo::getInstance();
$overviewRepo    = OverviewRepo::getInstance();
