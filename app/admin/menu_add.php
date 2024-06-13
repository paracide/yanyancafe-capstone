<?php

namespace App\admin;

global $menuRepo;
use App\tools\AdminRouter;


$props = [
  'title' => 'New menu',
];
AdminRouter::view('menu_add', $props);
