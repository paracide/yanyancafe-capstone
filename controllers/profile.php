<?php

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/services/UserService.php';
$cssFileName = 'profile';
$title       = 'Profile';

$userId = $_SESSION['user_id'];
if (empty($userId)) {
    header('Location: error.php');
    die;
}
$user = getUserProfileById($conn, $userId);

// view starts
require_once __DIR__ . '/../includes/header.inc.php';
?>

<div class="page">
  <div class="profile">

    <div class="profile-img">
      <h1 class="gradient-anime">Profile</h1>
      <img src="../public/images/avatar.webp" alt="avatar">
    </div>
    <div class="info card">
      <div class="card-content">
        <h2 class="card-title">Personal Info</h2>
        <div class="card-text">
            <?php
            if ( ! empty($user['first_name'])): ?>
              <div><b>First Name:</b> <?= esc($user['first_name']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['last_name'])): ?>
              <div><b>Last Name:</b> <?= esc($user['last_name']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['email'])): ?>
              <div><b>Email:</b> <?= esc($user['email']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['birthday'])): ?>
              <div><b>Birthday:</b> <?= esc($user['birthday']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['phone'])): ?>
              <div><b>Phone:</b> <?= esc($user['phone']) ?></div>
            <?php
            endif; ?>
        </div>
      </div>
    </div>
    <div class="info card">
      <div class="card-content">
        <h2 class="card-title">Addresses</h2>
        <div class="card-text">
            <?php
            if ( ! empty($user['street'])): ?>
              <div><b>Street:</b> <?= esc($user['street']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['city'])): ?>
              <div><b>City:</b> <?= esc($user['city']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['province'])): ?>
              <div><b>Province:</b> <?= esc($user['province']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['country'])): ?>
              <div><b>Country:</b> <?= esc($user['country']) ?></div>
            <?php
            endif; ?>
            <?php
            if ( ! empty($user['postal_code'])): ?>
              <div><b>Postal Code:</b> <?= esc($user['postal_code']) ?></div>
            <?php
            endif; ?>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
require_once __DIR__ . '/../includes/footer.inc.php'; ?>
