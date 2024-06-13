<?php

namespace App\admin;

global $menuRepo;
use App\tools\AdminRouter;

$key   = $_GET['key'] ?? null;
$menus = $menuRepo->search($key, null);

$props = [
  'title' => 'Menu Management',
  'menus' => $menus,
  'key' => $key,
];
AdminRouter::view('menu', $props);
