<?php

namespace App\admin;

use App\tools\AdminRouter;

$props = [
  'title' => 'Error',
  'desc'  => 'Some Errors happened',
];
AdminRouter::view('error', $props);

