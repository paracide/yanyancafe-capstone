<?php

// view starts
require_once __DIR__ . '/components/Header.php';
?>

<div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
  <div class="card hidden md:flex glass ">
    <figure><img class='w-full' src="images/avatar.webp" alt="car!"/></figure>
    <div class="card-body">
      <div class="card-title ">
        <h2 class="text-7xl gradient-anime">Profile</h2>
      </div>
    </div>
  </div>
  <div class="card  glass ">
    <div class="card-body gap-10">
      <div class="text-4xl card-title">Personal Info</div>
      <div class="card-actions justify-start flex-col">
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
  <div class="card glass">
    <div class="card-body gap-10">
      <div class="text-4xl card-title">Addresses</div>
      <div class="card-actions justify-start flex-col">
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

<?php
require_once __DIR__ . '/components/Footer.php'; ?>
