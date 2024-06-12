<?php

use App\interface\service\CartService;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

/**
 * This controller is used to clear cart
 * return to Cart page
 */
Preconditions::checkPostRequest();
CartService::clearFood();

FlashUtils::success("Clear cart successfully");
Router::success(Router::cart);

