<?php

require_once __DIR__ . '/components/Header.php';

?>


<main class="bg-gray-100">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
      <div class="p-4 border-b">
        <input type="text" placeholder="Search..."
               class="input input-bordered w-full"/>
      </div>
      <div class="p-4 space-y-2">
        <div class="menu">

            <?php
            foreach ($mainCat as $main) : ?>
              <div class="flex flex-col">
                <span class="font-bold"><?= esc($main['name']) ?></span>

                  <?php
                  foreach ($menuCat as $cat) : ?>
                      <?php
                      if ($cat['parent_id'] === $main['id']) : ?>
                        <a class="text-sm text-gray-500 p-2">
                            <?= esc($cat['name']) ?>
                        </a>

                      <?php
                      endif; ?>
                  <?php
                  endforeach; ?>
              </div>
            <?php
            endforeach; ?>


        </div>
      </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-8">
      <div class="card card-compact w-96 h-96 bg-base-100 shadow-xl">
        <figure><img src="images/menu/coffee.webp" alt="coffee"/></figure>
        <div class="card-body">
          <h2 class="card-title">Espresso</h2>
          <p><strong>A rich and bold espresso shot</strong>, perfect for a quick
            caffeine boost. Enjoy the intense flavor and aroma that coffee
            lovers crave.</p>
          <div class="card-actions justify-end">
            <button class="btn btn-second">Add</button>
          </div>
        </div>
      </div>
    </main>
  </div>
</>


<?php
require_once __DIR__ . '/components/Footer.php'; ?>
