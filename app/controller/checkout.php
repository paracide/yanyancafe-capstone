<?php

namespace App\controller;

use App\service\impl\CartSvr;
use App\tools\Router;

$props          = CartSvr::cartSummary();
$props['title'] = 'Checkout';
Router::view('checkout', $props);
