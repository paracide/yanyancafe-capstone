<?php

global $userRepo, $ordersRepo, $orderDetailRepo;
use App\tools\Auth;
use App\tools\Preconditions;
use App\tools\Router;

$userId       = Preconditions::checkEmpty(Auth::getUserId());
$profile      = $userRepo->getUserProfileById($userId);
$order        = $ordersRepo->getById($_GET['order_id']);
$orderDetails = $orderDetailRepo->searchByOrderId($order['id']);

$props = [
  'profile'      => $profile,
  'order'        => $order,
  'orderDetails' => $orderDetails,
  'title'        => 'Invoice',
];

Router::view('invoice', $props);
