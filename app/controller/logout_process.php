<?php

use App\tools\Auth;
use App\tools\FlashUtils;
use App\tools\Preconditions;
use App\tools\Router;

Preconditions::checkPostRequest();
Auth::logout();
FlashUtils::success("You have successfully logged out");
Router::go(Router::index);
