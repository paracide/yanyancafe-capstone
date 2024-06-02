<?php

declare(strict_types=1);

use model\AddressRepository;
use model\Repository;
use model\UserRepository;

session_start();
ob_start();

require_once __DIR__ . '/Constant.php';

$post   = $_SESSION[Constant::SESSION_POST] ?? [];
$errors = $_SESSION[Constant::SESSION_ERRORS] ?? [];
$flash  = $_SESSION[Constant::SESSION_FLASH] ?? [];
unset($_SESSION[Constant::SESSION_POST]);
unset($_SESSION[Constant::SESSION_ERRORS]);
unset($_SESSION[Constant::SESSION_FLASH]);

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/../model/Repository.php';
require_once __DIR__ . '/../model/AddressRepository.php';
require_once __DIR__ . '/../model/UserRepository.php';
require_once __DIR__ . '/credentials.php';
//default PDO config
$conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
Repository::init($conn);


require_once __DIR__ . '/../tools/StringUtils.php';
require_once __DIR__ . '/../tools/Preconditions.php';
require_once __DIR__ . '/../tools/Auth.php';
require_once __DIR__ . '/../tools/FlashUtils.php';
require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/../tools/Verifier.php';
require_once __DIR__ . '/../tools/Validator.php';
require_once __DIR__ . '/../components/Flash.php';

const SITE_NAME = 'Yanyan Cafe';

/**
 * injection repositories dependencies globally
 * due to the config.php will be loaded on every page
 * so make the repositories singleton
 */
$addressRepository = AddressRepository::getInstance();
$userRepository    = UserRepository::getInstance();

