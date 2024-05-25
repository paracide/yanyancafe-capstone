<?php

$props = [
  'title'       => 'Error',
  'desc'        => 'Some Errors happened',
  'cssFileName' => 'error',
  'isHomePage'  => true,
];
Router::view('error', $props);

