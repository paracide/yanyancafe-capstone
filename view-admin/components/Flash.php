<?php

global $flash;
$success = $flash['success'] ?? '';
$error   = $flash['error'] ?? '';
if ( ! empty($success)) : ?>
  <div id="toast-info" class="toast-info"><span><?= esc($success) ?></span>
  </div>
<?php
endif; ?>

<?php
if ( ! empty($error)) : ?>
  <div id="toast-info"
       class="toast-error">
    <span><?= esc($error) ?></span>
  </div>

<?php
endif; ?>

<script>
  $(() => {
    setTimeout(() => {
      $('.toast-info, .toast-error').fadeOut('slow');
    }, 3000);
  });
</script>
