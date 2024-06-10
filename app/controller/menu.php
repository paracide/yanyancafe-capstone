<?php

global $categoryRepo, $menuRepo;
use App\tools\Router;

$allCat   = $categoryRepo->getAll();
$menus    = $menuRepo->search(null, null);
$firstCat = array_filter($allCat, function ($v) {
    return $v['parent_id'] === 1;
});

$props = [
  'cssFileName' => 'menu',
  'menus'       => $menus,
  'allCat'      => $allCat,
  'firstCat'    => $firstCat,
  'title'       => 'Happy Hour',
  'isHomePage'  => true,
  'desc'        => "Where whispers of cinnamon dance with whispers of tea, concoctions for
                      weary souls and hearts seeking
                      solace.",
];

Router::view('menu', $props);
