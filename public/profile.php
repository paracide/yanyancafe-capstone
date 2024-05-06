<?php

require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/services/UserService.php';
$cssFileName = 'profile';
$title       = 'Profile';
$desc        = '';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    header('Location: error.php');
    die;
}
$user = getUserProfileById($conn, $userId);

// view starts
require_once __DIR__.'/../includes/header.inc.php';
?>

<div class="page">
  <div><?= esc($user['email']) ?></div>


</div>

<?php
require_once __DIR__.'/../includes/footer.inc.php'; ?>
