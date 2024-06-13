<?php

namespace App\controller;
use App\tools\Router;

$props = [
  'cssFileName' => 'cats',
  'title'       => 'Superstars',
  'isHomePage'  => true,
  'desc'        => "Eyes of amber, coats of moonlit silk, each whisker holds a tale, an
                      odyssey in every lick.",
];

Router::view('cats', $props);
