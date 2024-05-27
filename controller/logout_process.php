<?php

Preconditions::checkPostRequest();
Auth::logout();
FlashUtils::success("You have successfully logged out");
Router::go(Router::index);
