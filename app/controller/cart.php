<?php

use App\constant\Constant;
use App\tools\Router;

$cart = $_SESSION[Constant::SESSION_CART] ?? [];

$subTotal = $cart ? array_reduce($cart, function ($carry, $food) {
    return $carry + $food['totalPrice'];
}) : 0;

$props = [
  'title'    => 'Cart',
  'cart'     => $cart,
  'subTotal' => $subTotal,
  'tax'      => number_format($subTotal * 0.12, 2),
  'total'    => number_format($subTotal * 1.12, 2),

];
Router::view('cart', $props);
