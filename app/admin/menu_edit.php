<?php

namespace App\admin;

global $menuRepo;
global $categoryRepo;
use App\tools\AdminRouter;
use App\tools\Preconditions;

$menuId  = Preconditions::checkEmpty($_GET['menu_id']);
$menu    = $menuRepo->searchById($menuId);
$menuCat = $categoryRepo->searchMenuCat();
$props = [
  'title'   => 'Edit menu',
  'menuCat' => $menuCat,
  'menu'    => $menu,
];
AdminRouter::view('menu_edit', $props);
