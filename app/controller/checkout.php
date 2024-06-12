<?php

use App\interface\service\CartService;
use App\tools\Router;

$props          = CartService::cartSummary();
$props['title'] = 'Checkout';
Router::view('checkout', $props);
