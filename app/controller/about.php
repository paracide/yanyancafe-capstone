<?php

use App\tools\Router;

$props = [
  'cssFileName' => 'about',
  'title'       => 'Odyssey',
  'isHomePage'  => true,
  'desc'        => "Unfurl your tales, share your whispers, let words like butterflies
                      flutter in this haven of ink and
                      purrs.",
];

Router::view('about', $props);
