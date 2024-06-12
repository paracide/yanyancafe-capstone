<?php

global $categoryRepo, $menuRepo;
use App\tools\Router;


$paramCat = $_GET['category'] ?? null;
$paramKey = $_GET['key'] ?? null;
$menus    = $menuRepo->search($paramKey, $paramCat);


$props = [
  'cssFileName' => 'menu',
  'menus'       => $menus,
  'title'       => 'Happy Hour',
  'menuSize'    => count($menus),

];

Router::view('menu', $props);
