<?php

use App\tools\Router;

$cart  = $_SESSION['cart'] ?? [];
$props = [
  'title' => 'Cart',
  'cart'  => $cart,
];

Router::view('cart', $props);
