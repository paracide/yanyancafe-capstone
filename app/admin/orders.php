<?php

namespace App\admin;

global $ordersRepo;
use App\tools\AdminRouter;

$orders = $ordersRepo->searchAll();

$props = [
  'title'  => 'Order Management',
  'orders' => $orders,
];
AdminRouter::view('orders', $props);
