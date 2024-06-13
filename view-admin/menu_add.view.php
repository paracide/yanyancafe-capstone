<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex flex-col gap-4 justify-between items-center">
      <div class="flex w-full">
        <h1 class="text-2xl justify-start"><?= esc($title) ?></h1>
      </div>
      <form id="menu-form" method="POST" class="flex flex-col w-full gap-4"
            action="/admin?menu_add_process">
        <div class="grid grid-cols-2 gap-4">
          <!-- Name -->
          <div>
            <label class="input input-bordered flex items-center gap-2">
              Name
              <input type="text" name="name" class="grow"
                     placeholder="Enter name">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>
          <!-- Category ID -->
          <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
            <span>Category</span>
              <select class="w-full appearance-none focus:outline-none">
                <option disabled selected>Who shot first?</option>
                <option>Han Solo</option>
                <option>Greedo</option>
              </select>
            </label>
          </div>
          <!-- Price -->
          <div>
            <label class="input input-bordered flex items-center gap-2">
              Price
              <input type="number" name="price" step="0.01"
                     placeholder="Enter price">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>
          <!-- Size -->
          <div class="w-full">
            <label class="input input-bordered flex items-center gap-2">
              <span>Size</span>
              <select class="w-full appearance-none focus:outline-none">
                <option disabled selected>Who shot first?</option>
                <option>Han Solo</option>
                <option>Greedo</option>
              </select>
            </label>
          </div>

          <!-- Discount -->
          <div>
            <label class="input input-bordered flex items-center gap-2">
              Discount
              <input type="number" name="discount" step="0.01"
                     placeholder="Enter discount">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>

          <!-- Calorie Count -->
          <div>
            <label class="input input-bordered flex items-center gap-2">
              Calorie Count
              <input type="number" name="calorie_count"

                     placeholder="Enter calorie count">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>

          <div class="form-control w-full flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Available</span>
              <input type="checkbox" class="toggle toggle-primary" checked />
            </label>

            <label class="cursor-pointer label gap-3">
              <span class="label-text">Takeaway</span>
              <input type="checkbox" class="toggle toggle-primary" checked />
            </label>


          </div>
        </div>
        <!-- Submit Button -->
        <div class="flex w-full gap-4">
          <button type="submit" class="btn btn-primary flex-1">Add Menu Item
          </button>
          <button type="reset" class="btn btn-secondary flex-1">Reset</button>
        </div>
      </form>

    </section>
  </div>
</main>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

