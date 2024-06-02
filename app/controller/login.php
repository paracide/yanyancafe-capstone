<?php

use App\tools\Router;

$props = [
  'title'       => 'Login',
  'cssFileName' => 'login',
];

Router::view('login', $props);
