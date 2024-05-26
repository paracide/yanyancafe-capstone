<?php

Preconditions::checkPostRequest();
Auth::logout();
Router::go(Router::index);
