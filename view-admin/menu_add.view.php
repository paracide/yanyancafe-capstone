<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex flex-col gap-4 justify-between items-center">
      <div class="flex w-full">
        <h1 class="text-2xl justify-start"><?= esc($title) ?></h1>
      </div>
      <form id="menu-form" method="POST" enctype="multipart/form-data"
            class="flex flex-col w-full gap-4"
            action="/admin?menu_add_process">
        <div class="grid grid-cols-2 gap-4">
          <!-- Name -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              Name
              <input type="text" name="name"
                     placeholder="Enter name">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>
          <!-- Category ID -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              <span>Category</span>
              <select name="category_id"
                      class="w-full appearance-none focus:outline-none">
                <option disabled selected>Select Category</option>
                  <?php
                  foreach ($menuCat as $cat) : ?>
                    <option value="<?= esc($cat['id']) ?>">
                        <?= esc($cat['name']) ?>
                    </option>
                  <?php
                  endforeach; ?>
              </select>
            </label>
          </div>
          <!-- Price -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              Price
              <input type="text" name="price"
                     placeholder="Enter price">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>
          <!-- Size -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              Size
              <input type="text" name="size"
                     placeholder="Enter size">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>

          <!-- Discount -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              Discount
              <input type="text" name="discount"
                     placeholder="Enter discount">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>

          <!-- Calorie Count -->
          <div class="max-w-lg">
            <label class="input input-bordered flex items-center gap-2">
              Calorie Count
              <input type="text" name="calorie_count"
                     placeholder="Enter calorie count">
            </label>
            <span class="hidden text-sm text-red-600">Error</span>
          </div>

          <div class="form-control w-full flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Available</span>
              <input type="checkbox" name="availability"
                     class="toggle toggle-primary" checked/>
            </label>


          </div>
          <div class="form-control w-full flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Takeaway</span>
              <input type="checkbox" name="is_take_away"
                     class="toggle toggle-primary" checked/>
            </label>
          </div>

          <input type="file" name="img"
                 class="file-input file-input-bordered file-input-secondary w-full max-w-lg"/>

          <textarea class="textarea textarea-bordered  max-w-lg" name="description"
                    placeholder="Description"></textarea>

          <button type="submit" class="btn btn-primary flex-1  max-w-lg">Add
          </button>
          <button type="reset" class="btn btn-secondary flex-1  max-w-lg">
            Reset
          </button>
        </div>
      </form>

    </section>
  </div>
</main>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

