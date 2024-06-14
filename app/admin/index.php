<?php

namespace App\admin;

global $logger, $ordersRepo, $menuRepo, $userRepo, $fileRepo, $overviewRepo;
use App\tools\AdminRouter;

$log = $logger->getLast();

$menu = [
  "total"    => $menuRepo->count(),
  "menu_cat" => $overviewRepo->menu(),
];

$user = [
  "total" => $userRepo->count(),
  "stat"  => $overviewRepo->user(),
];

$file = [
  "total" => $fileRepo->count(),
  "size"  => $overviewRepo->file(),
];

$orders = [
  "total" => $ordersRepo->count(),
  "stat"  => $overviewRepo->order(),
];

$props = [
  'title'  => 'Home',
  'last10' => $log,
  'menu'   => $menu,
  'user'   => $user,
  'orders' => $orders,
  'file'   => $file,
];
AdminRouter::view('index', $props);
