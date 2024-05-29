<?php

global $userRepository;

$userId = $_SESSION[Constant::SESSION_USER_ID] ?? '';
if (empty($userId)) {
    FlashUtils::error("You need to login firstly or register a new account. ");
    Router::go(Router::club);
}
$user = $userRepository->getUserProfileById($userId);

$props = [
  'title' => 'Profile',
  'user'  => $user,
];
Router::view('profile', $props);
