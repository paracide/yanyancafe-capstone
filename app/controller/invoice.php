<?php
namespace App\controller;

global $userRepo, $ordersRepo, $orderDetailRepo;
use App\tools\Auth;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

$userId       = Preconditions::checkEmpty(Auth::getUserId());
$profile      = $userRepo->getUserProfileById($userId);
$order        = $ordersRepo->getById($_GET['order_id']);
$orderDetails = $orderDetailRepo->searchByOrderId($order['id']);

if($order['user_id'] !==$userId){
    FlashUtils::error("This is not your order");
    Router::fail(Router::orders);
}

$props = [
  'profile'      => $profile,
  'order'        => $order,
  'orderDetails' => $orderDetails,
  'title'        => 'Invoice',
];

Router::view('invoice', $props);
