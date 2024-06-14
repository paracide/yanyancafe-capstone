<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="main">
  <section
    class="grid grid-cols-4 gap-4 mb-6">
    <div class="card p-4  shadow-lg rounded-lg">
      <h2 class="text-lg font-bold">Aggregate Function 1</h2>
      <p class="text-xl">Value 1</p>
    </div>
    <div class="card p-4  shadow-lg rounded-lg">
      <h2 class="text-lg font-bold">Aggregate Function 2</h2>
      <p class="text-xl">Value 2</p>
    </div>
    <div class="card p-4  shadow-lg rounded-lg">
      <h2 class="text-lg font-bold">Aggregate Function 3</h2>
      <p class="text-xl">Value 3</p>
    </div>
    <div class="card p-4  shadow-lg rounded-lg">
      <h2 class="text-lg font-bold">Aggregate Function 4</h2>
      <p class="text-xl">Value 4</p>
    </div>
  </section>
  <section class="log  shadow-lg rounded-lg p-4">
    <h2 class="text-xl font-bold mb-4">Log Entries</h2>
    <div class="log-entries space-y-2">
        <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Event</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $index = 1;
              foreach ($last10 as $item): ?>
                <tr class="bg-gray-100">
                  <td><?= $index ?></td>
                  <td><?= $item['created_at'] ?></td>
                  <td><?= $item['event'] ?></td>
                </tr>
                  <?php
                  $index++;
              endforeach; ?>
          </tbody>
        </table>

    </div>
  </section>


</main>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

