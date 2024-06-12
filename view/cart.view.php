<?php

require_once __DIR__ . '/components/Header.php';
?>


<div class="m-card w-full h-full mx-2 md:mx-8 mt-16">
  <div class="flex flex-col md:flex-row">
    <!--order details-->
    <div class="md:w-3/4 w-full p-4">
      <!--header-->
      <div class="flex justify-between border-b md:p-4">
        <h1>Cart</h1>
        <h2 class="text-2xl flex items-center gap-4">
          <form action="/?p=cart_clear_process" method="post">
            <button type="submit"
                    class="btn btn-success text-xl text-white">
              Clear
            </button>
          </form>
        </h2>
      </div>

      <!--table header-->
      <div class="flex mt-10 md:p-4">
        <h3 class="w-2/6 text-sm md:text-xl">
          Item</h3>
        <h3
          class=" w-1/6 text-sm md:text-xl ">
          Quantity</h3>
        <h3
          class=" w-1/6 text-sm md:text-xl ">
          Price</h3>
        <h3
          class=" w-1/6 text-sm md:text-xl">
          Total</h3>
        <h3
          class=" w-1/6 text-sm md:text-xl">
          Action</h3>
      </div>
      <!--content-->
        <?php
        if ( ! $cart): ?>
          <h2 class="text-6xl">Your cart is empty</h2>
        <?php
        else: ?>
            <?php
            foreach ($cart as $food) : ?>
              <div class="flex items-center md:p-4">
                <div class="flex w-2/6 gap-4 items-center">
                  <img class="hidden md:flex h-14 w-14 rounded-xl"
                       src="<?= $food['img'] ?>"
                       alt="food">
                  <div class="text-sm md:text-xl"><?= esc(
                        $food['name']
                      ) ?></div>
                </div>
                <span class="w-1/6 text-sm md:text-xl "><?= esc(
                      $food['quantity']
                    ) ?></span>
                <span class=" w-1/6 text-sm md:text-xl ">$<?= esc(
                      $food['price']
                    ) ?></span>
                <span class=" w-1/6 text-sm md:text-xl "><?= esc(
                      $food['totalPrice']
                    ) ?></span>
                <span class=" w-1/6 text-sm md:text-xl ">
              <form action="/?p=cart_del_process" method="post">
                <input name="menuId" value="<?= $food['id'] ?>" hidden/>
                <button class="btn btn-warning btn-sm"
                        type="submit">DEL</button>
              </form>
            </span>
              </div>
            <?php
            endforeach; ?>
        <?php
        endif; ?>
    </div>


    <!--cashier-->
    <div class="md:w-1/4 w-full flex flex-col rounded-xl gap-4 p-4">
      <h2 class="text-4xl">Summary</h2>
      <div class="flex justify-between">
        <span class="text-sm ">Subtotal</span>
        <span class="text-sm">$<?= esc($subTotal) ?></span>
      </div>
      <div class="flex justify-between">
        <span class="text-sm ">Tax</span>
        <span class="text-sm">$<?= esc($tax) ?></span>
      </div>

      <div class="border-t py-4 gap-4 flex flex-col">
        <div
          class="flex justify-between">
          <span>Total cost</span>
          <span>$<?= esc($total) ?></span>
        </div>
        <button onclick="window.location.href='/?p=checkout'"
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
