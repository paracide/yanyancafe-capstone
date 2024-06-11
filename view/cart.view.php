<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card mx-2 mt-16">
  <div class="flex">
    <!--order details-->
    <div class="w-3/4 p-10">
      <div class="flex justify-between border-b pb-8">
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
                <img class="h-20 w-20 rounded" src="<?= $food['file_path'] ?>"
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
            <span class="text-center w-1/5">$400.00</span>
          <?php
          endforeach; ?>
      </div>
    </div>

    <!--cashier-->
    <div id="summary" class="w-1/4 px-8 py-10">
      <h1 class="text-2xl border-b pb-8">Order Summary</h1>
      <div class="flex justify-between mt-10 mb-5">
        <span class="text-sm uppercase">Items 3</span>
        <span class="text-sm">$1200</span>
      </div>
      <div>
        <label
          class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
        <select class="block p-2 text-gray-600 w-full text-sm">
          <option>Standard shipping - $10.00</option>
        </select>
      </div>
      <div class="py-10">
        <label for="promo"
               class="inline-block mb-3 text-sm uppercase">Promo
          Code</label>
        <input type="text" id="promo" placeholder="Enter your code"
               class="p-2 text-sm w-full">
      </div>
      <button
        class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
        Apply
      </button>
      <div class="border-t mt-8">
        <div
          class="flex justify-between py-6 text-sm uppercase">
          <span>Total cost</span>
          <span>$1210</span>
        </div>
        <button
          class="bg-indigo-500 hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
          Checkout
        </button>
      </div>
    </div>
  </div>

</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
