<?php

namespace App\admin;

global $menuRepo;
global $categoryRepo;
use App\tools\AdminRouter;

$menuCat = $categoryRepo->searchMenuCat();
$props   = [
  'title'   => 'New menu',
  'menuCat' => $menuCat,
];
AdminRouter::view('menu_add', $props);
