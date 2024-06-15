<?php

require_once __DIR__ . '/components/Header.php';

$roleMap = [
  2 => 'Admin',
  3 => 'Staff',
  5 => 'Club Member',
  7 => 'Normal User',
];
?>


<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex justify-between items-center">
      <h1 class="text-2xl">
          <?= esc($title) ?>
      </h1>
    </section>
    <section class="w-full flex-1">
      <div class="overflow-x-auto">
        <table class="table w-full table-zebra">
          <!-- head -->
          <thead>
            <tr class="text-primary">
              <th class="text-center">Id</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Birthday</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
              <?php
              foreach ($users as $user) : ?>
                <tr>
                  <td class="text-center"><?= esc($user['id']) ?></td>
                  <td><?= esc($user['email']) ?></td>
                  <td><?= esc($user['first_name']) ?></td>
                  <td><?= esc($user['last_name']) ?></td>
                  <td><?= esc($user['birthday']) ?></td>
                  <td><?= esc($user['phone']) ?></td>
                  <td><?= esc($roleMap[$user['role']] ?? 'Unknown') ?></td>
                  <td><?= esc($user['created_at']) ?></td>
                </tr>
              <?php
              endforeach; ?>
          </tbody>
          <!-- foot -->
          <tfoot>
            <tr class="text-primary">
              <th class="text-center">Id</th>
              <th>Email</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Birthday</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Created</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>

  </div>
</main>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>

