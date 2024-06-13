<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <section class="flex justify-between items-center">
    <h1 class="text-2xl"><?= esc($title) ?></h1>
    <div class="flex gap-3">
      <input type="text" placeholder="Search..." id="searchKey"
             value="<?= $key ?? '' ?>"
             class="input input-bordered w-full"/>
        <?php
        if ($key): ?>
          <button onclick="window.location='/admin?p=menu'" class="btn btn-secondary">All menu</button>
        <?php
        endif; ?>
      <button class="btn btn-primary">Add A Menu</button>
    </div>
  </section>

  <section class="w-full">
    <div class="overflow-x-auto">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Id</th>
            <th>Item</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Cals</th>
            <th>Status</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
            <?php
            foreach ($menus as $menu) : ?>
              <tr>
                <td>
                    <?= esc($menu['id']) ?>
                </td>
                <!--name and cat-->
                <td>
                  <div class="flex items-center gap-3">
                    <div class="avatar">
                      <div class="mask mask-squircle w-12 h-12">
                        <img
                          src="<?= $menu['file_path'] ?>"
                          alt="file"/>
                      </div>
                    </div>
                    <div>
                      <div class="font-bold"><?= $menu['name'] ?></div>
                      <div class="text-sm opacity-50">
                          <?= $menu['category'] ?>
                      </div>
                    </div>
                  </div>
                </td>
                <!--price-->
                <td>
                  <div>$<?= $menu['price'] ?></div>
                  <div class="text-sm opacity-50"><?= $menu['size'] ?></div>
                </td>
                <td>
                    <?= $menu['discount'] ?>%
                </td>
                <td>
                    <?= $menu['calorie_count'] ?>
                </td>
                <td class="flex flex-col gap-3">
                    <?php
                    if ($menu['availability']): ?>
                      <div class="badge badge-success	">In Stock</div>
                    <?php
                    else: ?>
                      <div class="badge badge-error	">Out of Stock</div>
                    <?php
                    endif; ?>

                    <?php
                    if ($menu['is_take_away']): ?>
                      <div class="badge badge-success	">Takeaway</div>
                    <?php
                    else: ?>
                      <div class="badge badge-error	">Din-In Only</div>
                    <?php
                    endif; ?>
                </td>
                <td>
                    <?= $menu['created_at'] ?>
                </td>
                <td>

                </td>

              </tr>
            <?php
            endforeach; ?>

        </tbody>
        <!-- foot -->
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Job</th>
            <th>Favorite Color</th>
            <th></th>
          </tr>
        </tfoot>

      </table>
    </div>
  </section>
</main>
<script>
  $(document).ready(function () {
    $('#searchKey').on('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        const searchKey = $('#searchKey').val();
        window.location.href = `/admin?p=menu&key=` + encodeURIComponent(searchKey);
      }
    });
  });
</script>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

