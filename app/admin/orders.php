<?php

namespace App\admin;

global $ordersRepo;
use App\tools\AdminRouter;

$orders = $ordersRepo->getAll();

$props = [
  'title'  => 'User Management',
  'orders' => $orders,
];
AdminRouter::view('orders', $props);
