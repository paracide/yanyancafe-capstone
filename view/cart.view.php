<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card mx-2 mt-16">
  <div class="flex">
    <!--order details-->
    <div class="w-3/4 p-4">
      <div class="flex justify-between border-b p-4">
        <h1 class="text-4xl">Shopping Cart</h1>
        <h2 class="text-2xl"><?= count($cart) ?> Items</h2>
      </div>
      <div class="flex mt-10 mb-5">
        <h3 class="w-2/5">
          Product Details</h3>
        <h3
          class="text-center w-1/5 text-center">
          Quantity</h3>
        <h3
          class="text-center w-1/5 text-center">
          Price</h3>
        <h3
          class="text-center w-1/5 text-center">
          Total</h3>
      </div>
      <div class="flex items-center hover:bg-gray-100 p-5">

          <?php
          foreach ($cart as $food) : ?>
            <div class="flex w-2/5">
              <div class="w-20">
                <img class="h-20 w-20 rounded" src="<?= $food['img'] ?>"
                     alt="product">
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm"><?= esc($food['name']) ?></span>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
                <?= esc($food['quantity']) ?>
            </div>
            <span class="text-center w-1/5 ">$<?= esc($food['price']) ?></span>
            <span class="text-center w-1/5"><?= esc(
                  $food['totalPrice']
                ) ?></span>
          <?php
          endforeach; ?>
      </div>
    </div>

    <!--cashier-->
    <div id="summary" class="w-1/4 p-4 flex flex-col gap-8">
      <h2 class="text-4xl border-b p-4">Order Summary</h2>
      <div class="flex justify-between">
        <span class="text-sm uppercase">Subtotal</span>
        <span class="text-sm">$1200</span>
      </div>
      <div class="flex justify-between">
        <span class="text-sm uppercase">Tax</span>
        <span class="text-sm">$1200</span>
      </div>


      <div class="border-t">
        <div
          class="flex justify-between">
          <span>Total cost</span>
          <span>$1210</span>
        </div>
        <button
          class="bg-orange-600 w-full text-xl text-white btn">
          Checkout
        </button>
      </div>
    </div>
  </div>

</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
