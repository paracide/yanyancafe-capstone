<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <section class="w-full flex justify-between items-center">
    <h1 class="text-2xl"><?= esc($title) ?></h1>
  </section>

</main>


<script>
  $(() => {
    $('#searchKey').on('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        const searchKey = $('#searchKey').val();
        window.location.href = `/admin?p=menu&key=` + encodeURIComponent(searchKey);
      }
    });
  });
</script>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

