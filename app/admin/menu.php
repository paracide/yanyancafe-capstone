<?php

namespace App\admin;

use App\tools\AdminRouter;

$props = [
  'title' => 'Menu Management',
];
AdminRouter::view('menu', $props);
