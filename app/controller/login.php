<?php
namespace App\controller;

use App\tools\Router;

$props = [
  'title'       => 'Login',
];

Router::view('login', $props);
