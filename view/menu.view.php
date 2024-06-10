<?php

require_once __DIR__ . '/components/Header.php';

function renderSidebar($mainCat, $menuCat): void
{
    foreach ($mainCat as $main) {
        echo '<div class="flex flex-col">';
        echo '<span class="font-bold">' . esc($main['name']) . '</span>';
        foreach ($menuCat as $cat) {
            if ($cat['parent_id'] === $main['id']) {
                echo '<a class="text-sm text-gray-500 p-2">' . esc($cat['name'])
                     . '</a>';
            }
        }
        echo '</div>';
    }
}

?>

<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-80 bg-white shadow-md">
    <div class="p-4 border-b">
      <form>
        <input type="text" placeholder="Search..."
               class="input input-bordered w-full"/>
      </form>
    </div>
    <div class="p-4 space-y-2">
      <div class="menu">
          <?php
          renderSidebar($firstCat, $allCat); ?>
      </div>
    </div>
  </aside>
  <!-- Main Content -->
  <div class="p-8 grid grid-cols-2 md:grid-cols-3 gap-8">
      <?php
      foreach ($menus as $menu) : ?>
        <div
          class="bg-gray-200 card card-compact h-96 bg-base-100 shadow-xl">
          <figure><img src="<?= $menu['file_path'] ?>" alt="coffee"/></figure>
          <div class="card-body">
            <div class="flex justify-between items-center	">
              <div class="card-title">
                  <?= esc($menu['name']) ?>
              </div>
              <div>
                  <?php
                  if ($menu['is_take_away']): ?>
                    <div class="badge badge-outline badge-info">Take Away
                    </div>
                  <?php
                  endif; ?>
                <div class="badge badge-outline badge-success"><?= esc(
                      $menu['category']
                    ) ?></div>
              </div>
            </div>

            <div class="flex justify-between items-center">
              <div>
                <div>
                  $
                  <span>
                      <?php
                      $discount      = $menu['discount'];
                      $originalPrice = $menu['price'];
                      $actualPrice   = $originalPrice * (100 - $discount) / 100;
                      if ($discount) {
                          echo "<del>$originalPrice</del><span class='text-green-500	'> $actualPrice</span>";
                      } else {
                          echo "$actualPrice";
                      }
                      ?>
                  </span>
                  <span>
                      - <?= esc($menu['size']) ?>
                  </span>
                </div>
                <span>
                    <?= $menu['calorie_count'] ?> Cals
                  </span>
              </div>

              <div class="flex card-actions">
                <button href="#" class="btn btn-success">Add</button>
              </div>
            </div>

          </div>
        </div>

      <?php
      endforeach; ?>
  </div>
</div>

<?php

require_once __DIR__ . '/components/Footer.php';

?>
