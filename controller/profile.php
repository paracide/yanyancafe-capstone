<?php

global $userRepository;
$title = 'Profile';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    Router::go500(null);
}
$user = $userRepository->getUserProfileById($userId);

$props = [
  'cssFileName' => 'profile',
  'title'       => 'Profile',
  'user'        => $user,
];
Router::view('profile', $props);
