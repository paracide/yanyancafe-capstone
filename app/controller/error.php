<?php

namespace App\controller;

use App\tools\Router;

$props = [
  'title'       => 'Error',
  'desc'        => 'Some Errors happened',
  'cssFileName' => 'error',
  'isHomePage'  => true,
];
Router::view('error', $props);

