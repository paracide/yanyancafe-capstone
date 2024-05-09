<?php

$cssFileName = 'profile';
$title       = 'Profile';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    go404();
}
$user = getUserProfileById($conn, $userId);

$props = [
  'cssFileName' => 'profile',
  'title'       => 'Profile',
  'user'        => $user,
];
view('profile', $props);
