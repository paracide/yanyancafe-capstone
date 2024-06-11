<?php

require_once __DIR__ . '/components/Header.php';

?>

<div class="flex min-h-screen bg-gray-100">
    <?php
    require_once __DIR__ . '/components/MenuSideBar.php';

    ?>
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
          <!--img-->
          <figure><img src="<?= $menu['file_path'] ?>" alt="coffee"/></figure>
          <!--content body-->
          <div class="card-body ">
            <div class="flex justify-between items-center">
              <!--title-->
              <a href="/?p=menu_details&id=<?= $menu['id'] ?>"
                 class="card-title">
                  <?= esc($menu['name']) ?>
              </a>
              <!--category-->
              <div>
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
                  <div class="badge bg-green-500 glass"><?= esc($menu['discount']) ?>%off
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
                <button href="#"
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
