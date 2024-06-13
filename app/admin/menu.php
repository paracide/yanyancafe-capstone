<?php

namespace App\admin;

use App\tools\AdminRouter;

$props = [
  'title' => 'Menu',
];
AdminRouter::view('menu', $props);
