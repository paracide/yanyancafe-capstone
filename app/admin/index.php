<?php

namespace App\admin;

global $logger;
use App\tools\AdminRouter;

$log = $logger->getLast10();
$props = [
  'title' => 'Home',
  'last10' => $log,
];
AdminRouter::view('index', $props);
