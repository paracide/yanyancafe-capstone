<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="main">
  <section class="stats shadow w-full">

    <div class="stat place-items-center">
      <div class="stat-title">Menu</div>
      <div class="stat-value"><?= $menu['total'] ?></div>
      <div class="stat-desc flex gap-4">
          <?php
          foreach ($menu['menu_cat'] as $cat) : ?>
            <div>
              <span><?= esc($cat['cat_name']) ?>:</span>
                <?= esc($cat['menu_count']) ?>
            </div>
          <?php
          endforeach; ?>
      </div>
    </div>

    <div class="stat place-items-center">
      <div class="stat-title">Users</div>
      <div class="stat-value text-secondary"><?= $user['total'] ?></div>
      <div class="stat-desc text-secondary">
        Latest: <?= esc(
            $user['stat']['first_name'] . $user['stat']['last_name']
          ) ?>
      </div>
      <div class="stat-desc text-secondary">
          <?= esc($user['stat']['created_at']) ?>
      </div>
    </div>

    <div class="stat place-items-center">
      <div class="stat-title text-accent">Orders</div>
      <div class="stat-value text-accent"><?= $orders['total'] ?></div>
      <div class="stat-desc flex gap-4 text-accent">
          <?php
          foreach ($orders['stat'] as $k => $v) : ?>
            <div>
              <span><?= ucfirst(esc($k)) ?>:</span>
              $<?= esc($v) ?>
            </div>
          <?php
          endforeach; ?>

      </div>
    </div>

    <div class="stat place-items-center text-success">
      <div class="stat-title">Files</div>
      <div class="stat-value"><?= $file['total'] ?></div>
      <div class="stat-desc"><?= $file['size'] ?>MB Used</div>
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
            $index
              = 1;
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

