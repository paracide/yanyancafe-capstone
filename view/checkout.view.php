<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card mx-8 mt-16">
  <div class="flex">
    <!--order details-->
    <div class="w-3/4 p-4">
      <!--header-->
      <div class="flex justify-between border-b p-4">
        <h1 >Orders</h1>
        <h2 class="text-2xl flex items-center gap-4">
            <?= count($cart) ?> Items
        </h2>
      </div>
      <!--content-->
      <div class="flex mt-10 p-4">
        <h3 class="w-2/5">
          Product Details</h3>
        <h3
          class=" w-1/5 ">
          Quantity</h3>
        <h3
          class=" w-1/5 ">
          Price</h3>
        <h3
          class=" w-1/5">
          Total</h3>
      </div>
        <?php
        foreach ($cart as $food) : ?>
          <div class="flex items-center p-4">
            <div class="flex w-2/5 gap-4 items-center">
              <img class="h-14 w-14 rounded-xl" src="<?= $food['img'] ?>"
                   alt="food">
              <div class="font-bold"><?= esc($food['name']) ?></div>
            </div>
            <span class="w-1/5"><?= esc($food['quantity']) ?></span>
            <span class=" w-1/5 ">$<?= esc($food['price']) ?></span>
            <span class=" w-1/5"><?= esc($food['totalPrice']) ?></span>
          </div>
        <?php
        endforeach; ?>
    </div>

    <!--cashier-->
    <div class="w-1/4 flex flex-col p-4 gap-4 glass rounded-xl">
      <h2 class="text-4xl ">Summary</h2>
      <div class="flex justify-between">
        <span class="text-sm ">Subtotal</span>
        <span class="text-sm">$<?= esc($subTotal) ?></span>
      </div>
      <div class="flex justify-between">
        <span class="text-sm ">Tax</span>
        <span class="text-sm">$<?= esc($tax) ?></span>
      </div>

      <div class="border-t flex flex-col py-4 gap-4">
        <div
          class="flex justify-between">
          <span>Total cost</span>
          <span>$<?= esc($total) ?></span>
        </div>
      </div>
      <!--credit card-->
      <h2 class="text-4xl ">Credit card</h2>
      <div class="grid  py-4 gap-4">
        <form action="/?p=checkout_process" method="post" novalidate>
          <div class="input-section">
            <div class="input-group">
              <label class="input-label" for="name">Name:</label>
              <input class="input-field" id="name" name="name" type="text">
              <span class="error-msg"><?= esc(
                    $errors['name'][0] ?? ''
                  ) ?></span>
            </div>

            <div class="input-group">
              <label class="input-label" for="no">Card No:</label>
              <input class="input-field" id="no" name="no" type="text">
              <span class="error-msg"><?= esc(
                    $errors['no'][0] ?? ''
                  ) ?></span>
            </div>


            <div class="input-group">
              <label class="input-label" for="date">Expiry Date:</label>
              <input class="input-field" id="date" name="date" type="month">
              <span class="error-msg"><?= esc(
                    $errors['date'][0] ?? ''
                  ) ?></span>
            </div>


            <div class="input-group">
              <label class="input-label" for="cvv">CVV:</label>
              <input class="input-field" id="cvv" name="cvv" type="text">
              <span class="error-msg"><?= esc(
                    $errors['cvv'][0] ?? ''
                  ) ?></span>
            </div>

            <button
              class="bg-orange-600 <?= $cart ? ''
                : 'btn-disabled' ?> w-full text-xl text-white btn">
              Pay Now
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
