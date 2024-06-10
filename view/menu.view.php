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

<main class="bg-gray-100">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
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
    <main class="p-8 grid grid-cols-2 md:grid-cols-3 gap-8">
        <?php
        foreach ($menus as $menu) : ?>
          <div
            class="p-2 bg-gray-200 card card-compact h-96 bg-base-100 shadow-xl">
            <figure><img src="images/menu/coffee.webp" alt="coffee"/></figure>
            <div class="card-body">
              <h2 class="card-title"><?= esc($menu['name']) ?></h2>
              <div>
                  <?= $menu['description'] ?>
              </div>
              <div class="card-actions justify-end">
                <button class="btn btn-second">Add</button>
              </div>
            </div>
          </div>

        <?php
        endforeach; ?>
    </main>
  </div>
</main>

<?php

require_once __DIR__ . '/components/Footer.php';

?>
