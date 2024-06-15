<?php

require_once __DIR__ . '/components/Header.php';
?>

<main>
  <section class="w-full">
    <h1 class="text-2xl"><?= esc($title) ?></h1>
    <div class="stats w-full">
      <!--menu-->
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
      <!--user-->
      <div class="stat place-items-center ">
        <div class="stat-title text-secondary">Users</div>
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
      <!--Order-->
      <div class="stat place-items-center ">
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
      <!---Files-->
      <div class="stat place-items-center">
        <div class="stat-title text-success">Files</div>
        <div class="stat-value text-success"><?= $file['total'] ?></div>
        <div class="stat-desc text-success"><?= $file['size'] ?>MB Used</div>
      </div>
    </div>
  </section>
  <section class="w-full">
    <h2 class="text-3xl font-bold mb-4">Recent 20 Logs</h2>
    <div class="overflow-x-auto">
      <table class="table w-full table-zebra">
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
              <tr>
                <td><?= $index ?></td>
                <td><?= $item['created_at'] ?></td>
                <td><?= $item['event'] ?></td>
              </tr>
                <?php
                $index++;
            endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Event</th>
          </tr>
        </tfoot>
      </table>

    </div>
  </section>


</main>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

