<?php

$props = [
  'cssFileName' => 'menu',
  'title'       => 'Happy Hour',
  'isHomePage'  => true,
  'desc'        => "Where whispers of cinnamon dance with whispers of tea, concoctions for
                      weary souls and hearts seeking
                      solace.",
];

Router::view('menu', $props);
