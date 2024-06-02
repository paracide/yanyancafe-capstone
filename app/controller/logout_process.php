<?php

use tools\Auth;
use tools\FlashUtils;
use tools\Preconditions;

Preconditions::checkPostRequest();
Auth::logout();
FlashUtils::success("You have successfully logged out");
Router::go(Router::index);
