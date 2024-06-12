<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="p-4">
  <h1 class="text-2xl font-bold mb-4">Orders List</h1>
  <div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- PHP to loop through orders and create cards -->
      <?php
      foreach ($orders as $order): ?>
        <div class="card bg-gray-300 shadow-xl rounded-lg overflow-hidden">
          <div class="card-body p-4">
            <h2 class="card-title text-xl font-semibold mb-2">Order ID: <?php
                echo htmlspecialchars($order['id']); ?></h2>
            <div class="mb-2">
              <span class="font-medium">Price:</span> $<?php
                echo htmlspecialchars($order['price']); ?>
            </div>
            <div class="mb-2">
              <span class="font-medium">GST:</span> $<?php
                echo htmlspecialchars($order['gst']); ?>
            </div>
            <div class="mb-2">
              <span class="font-medium">PST:</span> $<?php
                echo htmlspecialchars($order['pst']); ?>
            </div>
            <div class="mb-2">
              <span class="font-medium">Total Price:</span> $<?php
                echo htmlspecialchars($order['total_price']); ?>
            </div>
            <div class="mb-2">
              <span class="font-medium">Status:</span> <span
                class="badge badge-info"><?php
                    echo htmlspecialchars($order['status']); ?></span>
            </div>
            <div class="mb-2">
                <?php
                echo htmlspecialchars($order['created_at']); ?>
            </div>

          </div>
        </div>
      <?php
      endforeach; ?>
  </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
