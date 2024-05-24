<?php

$success = $flash['success'] ?? '';
$error   = $flash['error'] ?? '';
if ( ! empty($success)) : ?>

  <div class="toast toast-start">
    <div class="alert alert-info">
      <span><?= esc($success) ?></span>
    </div>
  </div>
<?php
endif; ?>


<?php
if ( ! empty($error)) : ?>

  <div class="toast toast-start">
    <div class="alert alert-success">
      <span><?= esc($error) ?></span>
    </div>
  </div>
<?php
endif; ?>
