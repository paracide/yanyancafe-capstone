<?php

require_once __DIR__ . '/components/Header.php';
?>

<main>
  <section class="w-full flex justify-between items-center">
    <h1 class="text-2xl">
        <?= esc($title) ?>
    </h1>
    <span class="text-sm opacity-50">
          We're sorry, this page is currently under construction. Please check back later!
        </span>
  </section>
</main>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

