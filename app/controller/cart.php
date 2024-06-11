<?php

use App\constant\Constant;
use App\tools\Router;

$cart  = $_SESSION[Constant::SESSION_CART] ?? [];
$props = [
  'title' => 'Cart',
  'cart'  => $cart,
];

Router::view('cart', $props);
