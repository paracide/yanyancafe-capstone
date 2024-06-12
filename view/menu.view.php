<?php

require_once __DIR__ . '/components/Header.php';

?>

<div class="flex w-full h-full rounded-xl bg-gray-100 mt-16">
    <?php
    require_once __DIR__ . '/components/MenuSidebar.php';

    ?>
  <div class="grow p-8 grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php
      if ( ! $menuSize): ?>
        <p
          class="text-xl"><?= "Searching $paramKey finds 0 results..." ?></p>
      <?php
      endif; ?>
      <?php
      foreach ($menus as $menu) : ?>
        <div
          class="bg-gray-100 card card-compact h-76 md:h-96 shadow-xl">
          <!--img-->
          <figure class="h-32 md:h-64">
            <img src="<?= $menu['file_path'] ?>" alt="food"/>
          </figure>
          <!--content body-->
          <div class="card-body ">
            <div class="flex flex-col md:flex-row justify-between items-center">
              <!--title-->
              <a href="/?p=menu_details&id=<?= $menu['id'] ?>"
                 class="card-title">
                  <?= esc($menu['name']) ?>
              </a>
              <!--category-->
              <div class="hidden md:flex">
                <div class="badge bg-orange-600 text-white p-3"><?= esc(
                      $menu['category']
                    ) ?>
                </div>
              </div>
            </div>
            <!--badge-->
            <div>
                <?php
                if ($menu['availability']): ?>
                  <div class="badge badge-outline badge-success">Available
                  </div>
                <?php
                else: ?>
                  <div class="badge badge-outline badge-error">Unavailable
                  </div>
                <?php
                endif; ?>

                <?php
                if ($menu['is_take_away']): ?>
                  <div class="badge badge-outline badge-info">Take Away
                  </div>
                <?php
                endif; ?>

                <?php
                if ($menu['discount']): ?>
                  <div class="badge bg-green-500 glass"><?= esc(
                        $menu['discount']
                      ) ?>%off
                  </div>
                <?php
                endif; ?>


            </div>
            <!--price and button-->
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
                <button onclick="addToCart(<?= $menu['id'] ?>)"
                        class="bg-orange-600 text-white  btn <?= $menu['availability']
                          ? ''
                          : 'btn-disabled' ?>">Add
                </button>
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
