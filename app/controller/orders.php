<?php
namespace App\controller;


global $ordersRepo;
use App\tools\Auth;
use App\tools\Router;

$userId = Auth::getUserId();
$orders = $ordersRepo->searchById($userId);

$props = [
  'title'  => 'Orders',
  'orders' => $orders,
];

Router::view('orders', $props);
