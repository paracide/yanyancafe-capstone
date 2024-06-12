<?php

use App\interface\service\CartService;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

Preconditions::checkPostRequest();
$menuId = $_POST['menuId'];
CartService::delFood($menuId);

FlashUtils::success("Delete successfully");
Router::success(Router::cart);

