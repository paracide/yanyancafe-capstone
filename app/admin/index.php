<?php

namespace App\admin;

global $logger, $ordersRepo, $menuRepo, $userRepo, $fileRepo, $overviewRepo;
use App\tools\AdminRouter;

$log = $logger->getLast();

$menu = [
  "total"    => $menuRepo->count(),
  "menu_cat" => $overviewRepo->menu(),
];

$props = [
  'title'  => 'Home',
  'last10' => $log,
  'menu'   => $menu,
];
AdminRouter::view('index', $props);
