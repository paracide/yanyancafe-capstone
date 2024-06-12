<?php

use App\tools\AdminRouter;

$props = [
  'title' => 'Home',
];
AdminRouter::view('index', $props);
