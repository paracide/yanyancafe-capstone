<?php

require_once __DIR__ . '/components/Header.php';

function renderSidebar($mainCat, $menuCat): void
{
    foreach ($mainCat as $main) {
        echo
        <<<HTML
        <div class="flex flex-col">
        <span class="font-bold">{$main['name']}</span>
        HTML;

        foreach ($menuCat as $cat) {
            if ($cat['parent_id'] === $main['id']) {
                $catName = esc($cat['name']);

                echo <<<HTML
                      <a id="cat{$cat['id']}" href="/?p=menu&category={$cat['id']}" class="text-sm text-gray-500 p-2">
                       {$catName}
                       </a>
                     HTML;
            }
        }
        echo '</div>';
    }
}

$menuSize = count($menus);

?>

<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <aside class="w-80 bg-white shadow-md">
    <div class="p-4 border-b">
      <input type="text" placeholder="Search..." id="searchKey"
             value="<?= $paramKey ?? '' ?>"
             class="input input-bordered w-full"/>
    </div>
    <div class="p-4 space-y-2">
      <div class="menu">
        <div class="flex flex-col">
          <a href="/?p=menu" class="font-bold">All</a>
        </div>
          <?php
          renderSidebar($firstCat, $allCat); ?>
      </div>
    </div>
  </aside>
  <!-- Main Content -->
  <div class="grow p-8 grid grid-cols-2 md:grid-cols-3 gap-8">
      <?php
      if ( ! $menuSize): ?>
        <p
          class="text-xl"><?= "Searching $paramKey finds 0 results..." ?></p>
      <?php
      endif; ?>
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

<script>
  $(document).ready(function () {
    $('#searchKey').on('keypress', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        const searchKey = $('#searchKey').val();
        window.location.href = `/?p=menu&category=<?= $paramCat ?>&key=` + encodeURIComponent(searchKey);
      }
    });
  });
</script>
<?php

require_once __DIR__ . '/components/Footer.php';

?>
