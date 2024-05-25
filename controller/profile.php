<?php

$cssFileName = 'profile';
$title       = 'Profile';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    go500(null);
}
$user = getUserProfileById($userId);

$props = [
  'cssFileName' => 'profile',
  'title'       => 'Profile',
  'user'        => $user,
];
view('profile', $props);
