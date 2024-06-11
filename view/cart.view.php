<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card mx-8 mt-16">
  <div class="flex">
    <!--order details-->
    <div class="w-3/4 p-4">
      <!--header-->
      <div class="flex justify-between border-b p-4">
        <h1 class="text-4xl">Cart</h1>
        <h2 class="text-2xl flex items-center gap-4">
          <form action="/?p=cart_clear_process" method="post">
            <button type="submit" class="btn btn-success text-xl text-white">
              Clear
            </button>
          </form>
            <?= count($cart) ?> Items
        </h2>
      </div>
      <!--content-->
      <div class="flex mt-10 p-4">
        <h3 class="w-2/6">
          Product Details</h3>
        <h3
          class=" w-1/6 ">
          Quantity</h3>
        <h3
          class=" w-1/6 ">
          Price</h3>
        <h3
          class=" w-1/6">
          Total</h3>
        <h3
          class=" w-1/6">
          Action</h3>
      </div>
        <?php
        foreach ($cart as $food) : ?>
          <div class="flex items-center p-4">
            <div class="flex w-2/6 gap-4 items-center">
              <img class="h-14 w-14 rounded-xl" src="<?= $food['img'] ?>"
                   alt="food">
              <div class="font-bold"><?= esc($food['name']) ?></div>
            </div>
            <span class="w-1/6"><?= esc($food['quantity']) ?></span>
            <span class=" w-1/6 ">$<?= esc($food['price']) ?></span>
            <span class=" w-1/6"><?= esc($food['totalPrice']) ?></span>
            <span class=" w-1/6">
              <form action="/?p=cart_del_process" method="post">
                <input name="menuId" value="<?= $food['id'] ?>" hidden/>
                <button class="btn btn-warning" type="submit">DEL</button>
              </form>
            </span>
          </div>
        <?php
        endforeach; ?>
    </div>

    <!--cashier-->
    <div class="w-1/4 p-4 flex flex-col gap-12 glass rounded-xl">
      <h2 class="text-4xl border-b p-4">Summary</h2>
      <div class="flex justify-between">
        <span class="text-sm uppercase">Subtotal</span>
        <span class="text-sm">$<?= esc($subTotal) ?></span>
      </div>
      <div class="flex justify-between">
        <span class="text-sm uppercase">Tax</span>
        <span class="text-sm">$<?= esc($tax) ?></span>
      </div>

      <div class="border-t flex flex-col gap-8">
        <div
          class="flex justify-between">
          <span>Total cost</span>
          <span>$<?= esc($total) ?></span>
        </div>
        <button
          class="bg-orange-600 <?= $cart ? ''
            : 'btn-disabled' ?> w-full text-xl text-white btn">
          Checkout
        </button>
      </div>
    </div>
  </div>
</div>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
