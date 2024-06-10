<?php

global $categoryRepo;
use App\tools\Router;

$menuCat = $categoryRepo->getAll();
$mainCat = array_filter($menuCat, function ($v) {
    return $v['parent_id'] === 1;
});

$props = [
  'cssFileName' => 'menu',
  'menuCat'     => $menuCat,
  'mainCat'     => $mainCat,
  'title'       => 'Happy Hour',
  'isHomePage'  => true,
  'desc'        => "Where whispers of cinnamon dance with whispers of tea, concoctions for
                      weary souls and hearts seeking
                      solace.",
];

Router::view('menu', $props);
