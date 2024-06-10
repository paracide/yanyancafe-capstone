<?php

global $categoryRepo, $menuRepo;
use App\tools\Router;

$allCat   = $categoryRepo->getAll();
$paramCat = $_GET['category'] ?? null;
$paramKey = $_GET['key'] ?? null;
$menus    = $menuRepo->search($paramKey, $paramCat);
$firstCat = array_filter($allCat, function ($v) {
    return $v['parent_id'] === 1;
});

$props = [
  'cssFileName' => 'menu',
  'menus'       => $menus,
  'allCat'      => $allCat,
  'firstCat'    => $firstCat,
  'paramKey'    => $paramKey,
  'paramCat'    => $paramCat,
  'title'       => 'Happy Hour',

];

Router::view('menu', $props);
