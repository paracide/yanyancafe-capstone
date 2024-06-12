<?php

use App\interface\service\CartService;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

Preconditions::checkPostRequest();
CartService::clearFood();

FlashUtils::success("Clear cart successfully");
Router::success(Router::cart);

