<?php

global $userRepository;

$userId = $_SESSION[Constant::SESSION_USER_ID]??'';
if (empty($userId)) {
    Router::go500(null);
}
$user = $userRepository->getUserProfileById($userId);

$props = [
  'title' => 'Profile',
  'user'  => $user,
];
Router::view('profile', $props);
