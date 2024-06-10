<?php

global $categoryRepo, $menuRepo;
use App\tools\Router;

$allCat   = $categoryRepo->getAll();
$pCat     = $_GET['category'] ?? null;
$menus    = $menuRepo->search(null, $pCat);
$firstCat = array_filter($allCat, function ($v) {
    return $v['parent_id'] === 1;
});

$props = [
  'cssFileName' => 'menu',
  'menus'       => $menus,
  'allCat'      => $allCat,
  'firstCat'    => $firstCat,
  'title'       => 'Happy Hour',

];

Router::view('menu', $props);
