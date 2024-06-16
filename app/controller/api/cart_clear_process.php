<?php

namespace App\controller\api;

use App\service\impl\CartSvr;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

/**
 * This controller is used to clear cart
 * return to Cart page
 */
Preconditions::checkPostRequest();
CartSvr::clearFood();

FlashUtils::success("Clear cart successfully");
Router::success(Router::cart);

