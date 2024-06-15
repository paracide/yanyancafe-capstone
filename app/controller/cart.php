<?php

namespace App\controller;

use App\service\impl\CartSvr;
use App\tools\Router;

$props          = CartSvr::cartSummary();
$props['title'] = 'Cart';
Router::view('cart', $props);
