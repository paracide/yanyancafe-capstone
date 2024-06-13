<?php

namespace App\admin;

global $menuRepo;
use App\tools\AdminRouter;

$searchKey = $_GET['key'] ?? null;
$menus     = $menuRepo->search($searchKey, null);

$props = [
  'title' => 'Menu Management',
  'menus' => $menus,
];
AdminRouter::view('menu', $props);
