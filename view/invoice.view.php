<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class=" mx-8 mt-16">
  <div class="text-sm md:text-lg">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <!--Company info-->
      <div class="m-card shadow-xl">
        <h2 class="text-4xl mb-4 pb-4 border-b">Company Info</h2>
        <p>Yanyan Cafe</p>
        <p>365, Portage St</p>
        <p>Winnipeg, MB</p>
        <p>R3G 1H1</p>
        <p>1-800-434-9900</p>
        <p><a href="paracidex@gmail.com">paracidex@gmail.com</a></p>
        </p>
      </div>
      <!--User Info-->
      <div class="m-card shadow-xl">
        <h2 class="text-4xl mb-4 pb-4 border-b">User Info</h2>
        <p><?= esc($profile['first_name']) ?> <?= esc(
              $profile['last_name']
            ) ?></p>
        <p><?= esc($profile['street']) ?></p>
        <p><?= esc($profile['city']) ?>, <?= esc($profile['province']) ?></p>
        <p><?= esc($profile['postal_code']) ?></p>
        <p><a href="<?= esc($profile['email']) ?>"><?= esc(
                  $profile['email']
                ) ?></a></p>
      </div>
      <!--Order Info-->

      <div class="m-card shadow-xl">
        <h2 class="text-4xl mb-4 pb-4 border-b">Order Info</h2>
        <p>Order No: <?= esc($order['id']) ?></p>
        <p>Date: <?= esc($order['created_at']) ?></p>
        <p>Credit Card: <?= esc($order['credit_card_no']) ?></p>
        <p>Status: <?= ucfirst(esc($order['status'])) ?></p>
        <p>Total Price: $<?= esc($order['total_price']) ?></p>
      </div>
    </div>
  </div>
</div>

<div class="m-card m-8 shadow-xl ">
  <div class="text-sm md:text-lg">
    <div class="grid grid-cols-4 justify-between mb-2 pb-2  border-b ">
      <div>
        <p class="font-bold ">Item</p>
      </div>
      <div class="font-bold ">
        <p>Unit Price</p>
      </div>
      <div class="font-bold ">
        <p>Quantity</p>
      </div>
      <div class="font-bold ">
        <p>Line Price</p>
      </div>
    </div>
      <?php
      foreach ($orderDetails as $food) : ?>
        <div class="grid grid-cols-4 justify-between mb-2">
          <div>
            <p><?= esc($food['menu']) ?></p>
          </div>
          <div>
            <p>$<?= esc($food['unit_price']) ?></p>
          </div>
          <div>
            <p><?= esc($food['quantity']) ?></p>
          </div>
          <div>
            <p>$<?= esc($food['line_price']) ?></p>
          </div>
        </div>

      <?php
      endforeach; ?>


    <div class="grid grid-cols-4 md:flex-row justify-between border-t pt-2">
      <div>
        <p class="font-bold ">Sub total</p>
        <p>$<?= esc($order['price']) ?></p>
      </div>
      <div>
        <p class="font-bold ">GST</p>
        <p>$<?= esc($order['gst']) ?></p>
      </div>
      <div>
        <p class="font-bold ">PST</p>
        <p>$<?= esc($order['pst']) ?></p>
      </div>
      <div>
        <p class="font-bold ">TOTAL</p>
        <p>$<?= esc($order['total_price']) ?></p>
      </div>
    </div>
  </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
