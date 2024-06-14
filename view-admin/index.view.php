<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="main">
  <section class="stats shadow w-full">

    <div class="stat place-items-center">
      <div class="stat-title">Menu</div>
      <div class="stat-value"><?= $menu['total'] ?></div>
      <div class="stat-desc flex gap-4">
        <?php foreach ($menu['menu_cat'] as$cat ) : ?>
          <div>
            <span><?= esc($cat['cat_name']) ?></span>
            <?= esc($cat['menu_count']) ?>
          </div>
          <?php endforeach; ?>

      </div>
    </div>

    <div class="stat place-items-center">
      <div class="stat-title">Users</div>
      <div class="stat-value text-secondary">4,200</div>
      <div class="stat-desc text-secondary">↗︎ 40 (2%)</div>
    </div>

    <div class="stat place-items-center">
      <div class="stat-title">New Registers</div>
      <div class="stat-value">1,200</div>
      <div class="stat-desc">↘︎ 90 (14%)</div>
    </div>

    <div class="stat place-items-center">
      <div class="stat-title">New Registers</div>
      <div class="stat-value">1,200</div>
      <div class="stat-desc">↘︎ 90 (14%)</div>
    </div>
  </section>
  <section class="log  shadow-lg rounded-lg p-4">
    <h2 class="text-xl font-bold mb-4">Log</h2>
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

