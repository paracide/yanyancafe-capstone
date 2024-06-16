<?php

namespace App\admin;

global $userRepo;
use App\tools\AdminRouter;

$users = $userRepo->getAll();

$props = [
  'title' => 'User Management',
  'users' => $users,
];
AdminRouter::view('user', $props);
