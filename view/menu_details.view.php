<?php

require_once __DIR__ . '/components/Header.php';

?>

<div class="flex min-h-screen bg-gray-100 mt-16">
    <?php
    require_once __DIR__ . '/components/MenuSidebar.php';
    ?>
  <!-- Main Content -->
  <div class="bg-base-200 h-5/6	">
    <div class="flex p-8 flex-col md:flex-row justify-center gap-4">
      <!--menu image-->
      <img src="<?= $menu['file_path'] ?>"
           class="w-full max-w-sm rounded-lg shadow-2xl md:w-auto"/>

      <!--menu details-->
      <div class="flex flex-col content-between gap-4">
        <!--title-->
        <p class="text-5xl font-bold"><?= esc($menu['name']) ?></p>
        <!--category-->
        <div>
          <div class="badge bg-orange-600 text-white p-4"><?= esc(
                $menu['category']
              ) ?>
          </div>
        </div>
        <!--desc-->
        <div>
            <?= $menu['description'] ?>
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
        <!--price-->
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

        <!--button-->
        <div class="flex">
          <button href="#"
                  class="bg-orange-600 w-full text-white btn <?= $menu['availability']
                    ? ''
                    : 'btn-disabled' ?>">Add To Cart
          </button>
        </div>

      </div>
    </div>
  </div>
</div>


<?php

require_once __DIR__ . '/components/Footer.php';

?>
