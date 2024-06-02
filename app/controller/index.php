<?php

use App\tools\Router;

$props = [
  'cssFileName' => 'index',
  'title'       => 'Yanyan Cafe',
  'isHomePage'  => true,
  'desc'        => "Where sunbeams meet purrs, and the world shrinks to soft paw prints,
                      a haven awaits, woven from stories and
                      sleep.",
];
Router::view('index', $props);
