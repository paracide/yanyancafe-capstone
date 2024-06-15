<?php

namespace App\controller\api;

use App\service\impl\CartSvr;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

/*
 * This controller is used to delete food from cart
 * return to Cart page
 */
Preconditions::checkPostRequest();
$menuId = $_POST['menuId'];
CartSvr::delFood($menuId);

FlashUtils::success("Delete successfully");
Router::success(Router::cart);

