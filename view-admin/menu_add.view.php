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
            class="flex flex-col w-full gap-4" action="/admin?menu_add_process">
        <div class="grid grid-cols-2 gap-4 place-items-center	">
          <!-- Name -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Name
              <input type="text" name="name"
                     value="<?= esc($post['name'] ?? '') ?>"
                     placeholder="Enter name">
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['name'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Category ID -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              <span>Category</span>
              <select name="category_id"
                      class="w-full appearance-none focus:outline-none">
                <option disabled selected>Select Category</option>
                  <?php
                  foreach ($menuCat as $cat) : ?>
                    <option value="<?= esc(
                      $cat['id']
                    ) ?>" <?= isset($post['category_id'])
                              && $post['category_id'] == $cat['id'] ? 'selected'
                      : '' ?>>
                        <?= esc($cat['name']) ?>
                    </option>
                  <?php
                  endforeach; ?>
              </select>
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['category_id'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Price -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Price
              <input type="text" name="price"
                     value="<?= esc($post['price'] ?? '') ?>"
                     placeholder="Enter price">
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['price'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Size -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Size
              <input type="text" name="size"
                     value="<?= esc($post['size'] ?? '') ?>"
                     placeholder="Enter size">
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['size'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Discount -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Discount
              <input type="text" name="discount"
                     value="<?= esc($post['discount'] ?? '') ?>"
                     placeholder="Enter discount">
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['discount'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Calorie Count -->
          <div class="max-w-lg w-full">
            <label class="input input-bordered flex items-center gap-2">
              Calorie Count
              <input type="text" name="calorie_count"
                     value="<?= esc($post['calorie_count'] ?? '') ?>"
                     placeholder="Enter calorie count">
            </label>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['calorie_count'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Availability -->
          <div class="form-control w-full max-w-lg flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Available</span>
              <input type="checkbox" name="availability"
                     class="toggle toggle-primary" <?= isset($post['availability'])
                                                       && $post['availability']
                                                          == 0 ? ''
                : 'checked' ?>/>
            </label>
          </div>

          <!-- Is Take Away -->
          <div class="form-control w-full max-w-lg flex-row justify-between">
            <label class="cursor-pointer label gap-3">
              <span class="label-text">Takeaway</span>
              <input type="checkbox" name="is_take_away"
                     class="toggle toggle-primary" <?= isset($post['is_take_away'])
                                                       && $post['is_take_away']
                                                          == 0 ? ''
                : 'checked' ?>/>
            </label>
          </div>

          <!-- File Upload -->
          <div class="max-w-lg w-full">
            <div class="flex gap-3 justify-center">
              <span class="label-text">Picture</span>
              <input type="file" name="img"
                     class="file-input file-input-bordered file-input-secondary flex-1">
            </div>
            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['img'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Description -->
          <div class="max-w-lg w-full">
            <textarea class="textarea textarea-bordered w-full max-w-lg"
                      name="description"
                      placeholder="Description"></textarea>

            <span class="hidden text-sm text-red-600"><?= esc(
                  $errors['description'][0] ?? ''
                ) ?></span>
          </div>

          <!-- Submit Button -->
          <button type="submit"
                  class="btn w-full btn-primary flex-1 max-w-lg">Add
          </button>

          <!-- Reset Button -->
          <button type="reset"
                  class="btn w-full btn-secondary flex-1 max-w-lg">Reset
          </button>
        </div>
      </form>


    </section>
  </div>
</main>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

