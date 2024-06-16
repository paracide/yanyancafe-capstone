<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex-1 flex flex-col gap-4">
    <section
      class="w-full flex flex-1 flex-col h-full gap-4 items-center">
      <div class="flex w-full">
        <h1 class="text-2xl justify-start"><?= esc($title) ?></h1>
      </div>
      <form id="menu-form" method="POST" enctype="multipart/form-data"
            novalidate
            class="flex flex-col flex-1 w-full gap-4"
            action="/admin/?p=menu_edit_process">
        <input type="text" name="id" value="<?= esc($menu['id']) ?>" hidden>

        <div class="grid grid-cols-2 gap-4 place-items-center	">
          <!-- Name -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Name
              <input type="text" name="name"
                     value="<?= esc($menu['name'] ?? '') ?>"
                     placeholder="Enter name">
            </label>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['name'] ?? ''
                ) ?></span>
          </div>

          <!-- Category ID -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              <span>Category</span>
              <select name="category_id"
                      class="w-full bg-transparent appearance-none focus:outline-none">
                <option disabled selected>Select Category</option>
                  <?php
                  foreach ($menuCat as $cat) : ?>
                    <option value="<?= esc(
                      $cat['id']
                    ) ?>" <?= isset($menu['category_id'])
                              && $menu['category_id'] == $cat['id'] ? 'selected'
                      : '' ?>>
                        <?= esc($cat['name']) ?>
                    </option>
                  <?php
                  endforeach; ?>
              </select>
            </label>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['category_id'] ?? ''
                ) ?></span>
          </div>

          <!-- Price -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Price
              <input type="text" name="price"
                     value="<?= esc($menu['price'] ?? '') ?>"
                     placeholder="Enter price">
            </label>
            <span class=" text-sm text-red-600 inline-block w-full "><?= esc(
                  $errors['price'] ?? ''
                ) ?></span>
          </div>

          <!-- Size -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Size
              <input type="text" name="size"
                     value="<?= esc($menu['size'] ?? '') ?>"
                     placeholder="Enter size">
            </label>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['size'] ?? ''
                ) ?></span>
          </div>

          <!-- Discount -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Discount
              <input type="text" name="discount"
                     value="<?= esc($menu['discount'] ?? '') ?>"
                     placeholder="Enter discount">
            </label>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['discount'] ?? ''
                ) ?></span>
          </div>

          <!-- Calorie Count -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Calorie Count
              <input type="text" name="calorie_count"
                     value="<?= esc($menu['calorie_count'] ?? '') ?>"
                     placeholder="Enter calorie count">
            </label>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['calorie_count'] ?? ''
                ) ?></span>
          </div>

          <!-- Availability -->
          <div class="form-control w-full max-w-lg flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Available</span>
              <input type="checkbox" name="availability"
                     class="toggle toggle-primary"
                <?= $menu['availability'] ? 'checked' : '' ?>
              />
            </label>
          </div>

          <!-- Is Take Away -->
          <div class="form-control w-full max-w-lg flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Takeaway</span>
              <input type="checkbox" name="is_take_away"
                     class="toggle toggle-primary"
                <?= $menu['is_take_away'] ? 'checked' : '' ?>
              />
            </label>
          </div>

          <!-- File Upload -->
          <div class="max-w-lg w-full">
            <div class="flex gap-3 justify-center items-center">
              <span class="label-text">Picture</span>
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img
                    src="<?= $menu['file_path'] ?>"
                    alt="file"/>
                </div>
              </div>
              <input type="file" name="picture" accept="image/*"
                     class="file-input file-input-bordered file-input-secondary flex-1">
            </div>
            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['picture'] ?? ''
                ) ?></span>
          </div>

          <!-- Description -->
          <div class="max-w-lg w-full">
            <div class="flex gap-3 justify-center items-center">
              <span class="label-text">Description</span>
              <textarea class="textarea textarea-bordered w-full flex-1"
                        name="description"
                        placeholder="Description"><?= esc(
                    $menu['description'] ?? ''
                  ) ?></textarea>
            </div>

            <span class=" text-sm text-red-600 inline-block w-full"><?= esc(
                  $errors['description'] ?? ''
                ) ?></span>
          </div>

          <!-- Submit Button -->
          <button type="submit"
                  class="btn w-full btn-primary flex-1 max-w-lg">Submit
          </button>

        </div>
      </form>


    </section>
  </div>
</main>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

