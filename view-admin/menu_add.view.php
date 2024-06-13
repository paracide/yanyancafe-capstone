<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex flex-col gap-4 justify-between items-center">
      <div class="flex w-full">
        <h1 class="text-2xl justify-start"><?= esc($title) ?></h1>
      </div>
      <form id="menu-form" method="POST" class="flex flex-col w-full gap-4" action="/admin?menu_add_process">
        <div class="grid grid-cols-3 gap-4">
          <!-- Name -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Name</span>
              <span id="error-name" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="text" name="name" placeholder="Name" class="input input-bordered w-full" required>
          </label>

          <!-- Description -->
          <label class="form-control w-full col-span-2">
            <div class="label">
              <span class="label-text">Description</span>
              <span id="error-description" class="hidden text-sm text-red-600">Error</span>
            </div>
            <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full"></textarea>
          </label>

          <!-- Category ID -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Category ID</span>
              <span id="error-category_id" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="number" name="category_id" placeholder="Category ID" class="input input-bordered w-full" required>
          </label>

          <!-- Price -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Price</span>
              <span id="error-price" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="number" step="0.01" name="price" placeholder="Price" class="input input-bordered w-full" required>
          </label>

          <!-- Size -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Size</span>
              <span id="error-size" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="text" name="size" placeholder="Size" class="input input-bordered w-full">
          </label>



          <!-- Discount -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Discount</span>
              <span id="error-discount" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="number" step="0.01" name="discount" placeholder="Discount" class="input input-bordered w-full">
          </label>

          <!-- Image File ID -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Image File ID</span>
              <span id="error-img_file_id" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="number" name="img_file_id" placeholder="Image File ID" class="input input-bordered w-full">
          </label>

          <!-- Calorie Count -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Calorie Count</span>
              <span id="error-calorie_count" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="number" name="calorie_count" placeholder="Calorie Count" class="input input-bordered w-full">
          </label>

          <!-- Is Take Away -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Is Take Away</span>
              <span id="error-is_take_away" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="checkbox" name="is_take_away" class="toggle">
          </label>

          <!-- Availability -->
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Availability</span>
              <span id="error-availability" class="hidden text-sm text-red-600">Error</span>
            </div>
            <input type="checkbox" name="availability" class="toggle">
          </label>
        </div>

        <!-- Submit Button -->
        <div class="flex w-full gap-4">
          <button type="submit" class="btn btn-primary flex-1">Add Menu Item</button>
          <button type="reset" class="btn btn-secondary flex-1">Reset</button>
        </div>
      </form>
    </section>
  </div>
</main>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

