<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <div class="page flex flex-col gap-4">
    <section class="w-full flex justify-between items-center">
      <h1 class="text-2xl"><?= esc($title) ?></h1>
      <div class="flex gap-3">
        <input type="text" placeholder="Search..." id="searchKey"
               value="<?= $key ?? '' ?>"
               class="input input-bordered w-full"/>
          <?php
          if ($key): ?>
            <button onclick="window.location='/admin?p=menu'"
                    class="btn btn-secondary">All menu
            </button>
          <?php
          endif; ?>
        <button class="btn btn-primary"
                onclick="window.location='/admin?p=menu_add'">Add Menu
        </button>
      </div>
    </section>
    <section class="w-full">
      <div class="overflow-x-auto">
        <table class="table w-full">
          <!-- head -->
          <thead>
            <tr>
              <th class="text-center"> Id</th>
              <th>Item</th>
              <th>Price</th>
              <th>Size</th>
              <th>Discount</th>
              <th>Cals</th>
              <th>Available</th>
              <th>Takeaway</th>
              <th>Created</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
              <?php
              foreach ($menus as $menu) : ?>
                <tr>
                  <td class="text-center">
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
                  </td>
                  <td>
                    <div><?= $menu['size'] ?></div>
                  </td>
                  <!--discount-->
                  <td>
                      <?= $menu['discount'] ?>%
                  </td>
                  <!--cals-->
                  <td>
                      <?= $menu['calorie_count'] ?>
                  </td>
                  <td>
                      <?php
                      if ($menu['availability']): ?>
                        <div class="badge badge-outline badge-primary	">In
                          Stock
                        </div>
                      <?php
                      else: ?>
                        <div class="badge badge-error	">Out of Stock</div>
                      <?php
                      endif; ?>
                  </td>
                  <td>
                      <?php
                      if ($menu['is_take_away']): ?>
                        <div class="badge badge-outline badge-primary">Takeaway
                        </div>
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
                    <div class="flex gap-3">
                      <div class="flex-1">
                        <button
                          onclick="window.location='/admin?p=menu_edit&menu_id=<?= esc(
                            $menu['id']
                          ) ?>'"
                          class="btn btn-primary w-full">EDIT
                        </button>
                      </div>
                      <div class="flex-1">
                        <form action="/admin?p=menu_del_process"
                              method="post">
                          <input hidden type="text" name="menu_id"
                                 value="<?= esc($menu['id']) ?>">
                          <button
                            class="del-menu-button flex-1 btn btn-error w-full">
                            DEL
                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php
              endforeach; ?>

          </tbody>
          <!-- foot -->
          <tfoot>
            <tr>
              <th class="text-center">Id</th>
              <th>Item</th>
              <th>Price</th>
              <th>Size</th>
              <th>Discount</th>
              <th>Cals</th>
              <th>Available</th>
              <th>Takeaway</th>
              <th>Created</th>
              <th>Action</th>
            </tr>

          </tfoot>

        </table>
      </div>
    </section>
  </div>
</main>

<script>
  $(() => {
    $('#searchKey').on('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        const searchKey = $('#searchKey').val();
        window.location.href = `/admin?p=menu&key=` + encodeURIComponent(searchKey);
      }
    });

    $('.del-menu-button').on('click', function (event) {
      let confirmDelete = confirm('Are you sure you want to delete this menu?');
      if (!confirmDelete) {
        event.preventDefault();
      }
    });

  });
</script>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

