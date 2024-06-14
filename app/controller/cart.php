<?php

namespace App\controller;

use App\interface\service\CartService;
use App\tools\Router;

$props          = CartService::cartSummary();
$props['title'] = 'Cart';
Router::view('cart', $props);
