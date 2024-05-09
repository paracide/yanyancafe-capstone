<?php

$cssFileName = 'profile';
$title       = 'Profile';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    header('Location: error.php');
    die;
}
$user = getUserProfileById($conn, $userId);

$props = [
  'cssFileName' => 'profile',
  'title'       => 'Profile',
  'user'        => $user,
];
view('profile', $props);
