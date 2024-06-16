<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex justify-between items-center">
      <h1 class="text-2xl">
          <?= esc($title) ?>
      </h1>
      <span class="text-sm opacity-50">
          We're sorry, this page is currently under construction. Please check back later!
        </span>
    </section>
    <section class="w-full">
      <div class="overflow-x-auto">
        <table class="table w-full table-zebra">
          <thead>
            <tr class="text-primary">
              <th class="text-center">Order Id</th>
              <th>User Email</th>
              <th>User Name</th>
              <th>User Phone</th>
              <th>Price</th>
              <th>GST</th>
              <th>PST</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
              <?php
              foreach ($orders as $order) : ?>
                <tr>
                  <td class="text-center"><?= esc($order['id']) ?></td>
                  <td><?= esc($order['email']) ?></td>
                  <td><?= esc(
                        $order['first_name'] . ' ' . $order['last_name']
                      ) ?></td>
                  <td><?= esc($order['phone']) ?></td>
                  <td>$<?= esc($order['price']) ?></td>
                  <td>$<?= esc($order['gst']) ?></td>
                  <td>$<?= esc($order['pst']) ?></td>
                  <td>$<?= esc($order['total_price']) ?></td>
                  <td><?= esc($order['status']) ?></td>
                  <td><?= esc($order['created_at']) ?></td>
                </tr>
              <?php
              endforeach; ?>
          </tbody>
          <tfoot>
            <tr class="text-primary">
              <th class="text-center">Order Id</th>
              <th>User Email</th>
              <th>User Name</th>
              <th>User Phone</th>
              <th>Price</th>
              <th>GST</th>
              <th>PST</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>Created At</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </section>

  </div>
</main>

<script>
  $(() => {
    $('#searchKey').on('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        const searchKey = $('#searchKey').val();
        window.location.href = `/admin/?p=menu&key=` + encodeURIComponent(searchKey);
      }
    });
  });
</script>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

