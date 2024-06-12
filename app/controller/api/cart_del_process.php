<?php
namespace App\controller\api;

use App\interface\service\CartService;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

/*
 * This controller is used to delete food from cart
 * return to Cart page
 */
Preconditions::checkPostRequest();
$menuId = $_POST['menuId'];
CartService::delFood($menuId);

FlashUtils::success("Delete successfully");
Router::success(Router::cart);

