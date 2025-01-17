<?php

namespace App\controller;

global $userRepo;

use App\constant\Constant;
use App\constant\HttpStatus;
use App\tools\FlashUtils;
use App\tools\Router;

$userId = $_SESSION[Constant::SESSION_USER_ID] ?? '';
if (empty($userId)) {
    FlashUtils::error("You need to login firstly or register a new account. ");
    Router::fail(Router::login, HttpStatus::FORBIDDEN);
}
$user = $userRepo->getUserProfileById($userId);

$props = [
  'title' => 'Profile',
  'user'  => $user,
];
Router::view('profile', $props);
