<?php

use App\constant\Constant;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

$menuId = $_POST['menuId'];
Preconditions::checkPostRequest();

unset($_SESSION[Constant::SESSION_CART][$menuId]);
FlashUtils::success("Delete successfully");
Router::success(Router::cart);

