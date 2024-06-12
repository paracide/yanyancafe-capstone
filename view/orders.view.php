<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card w-full h-full bg-gray-100 mx-2 md:mx-8 mt-16">
  <h1>Orders List</h1>
  <div
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- PHP to loop through orders and create cards -->
      <?php
      foreach ($orders as $order): ?>
        <div class="card bg-gray-300 shadow-xl rounded-lg overflow-hidden">
          <div class="card-body p-4">
            <h2 class="card-title text-2xl border-b ">Order No: <?php
                echo esc($order['id']); ?></h2>
            <div class="">
              <span class="">Price:</span> $<?php
                echo esc($order['price']); ?>
            </div>
            <div class="">
              <span class="">GST:</span> $<?php
                echo esc($order['gst']); ?>
            </div>
            <div class="">
              <span class="">PST:</span> $<?php
                echo esc($order['pst']); ?>
            </div>
            <div class="">
              <span class="">Total Price:</span> $<?php
                echo esc($order['total_price']); ?>
            </div>
            <div class="">
              <span class="">Status:</span> <span
                class="badge badge-info"><?php
                    echo esc($order['status']); ?></span>
            </div>
            <div class="">
                <?php
                echo esc($order['created_at']); ?>
            </div>
            <div class="card-actions justify-end">
              <button onclick="window.location='/?p=invoice&order_id=<?php
              echo esc($order['id']); ?>'" class="btn btn-success">
                See more
              </button>
            </div>
          </div>
        </div>
      <?php
      endforeach; ?>
  </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
