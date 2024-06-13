<?php
namespace App\admin;

use App\tools\AdminRouter;
use App\tools\Router;

$props = [
  'title'       => 'Error',
  'desc'        => 'Some Errors happened',
];
AdminRouter::view('error', $props);

