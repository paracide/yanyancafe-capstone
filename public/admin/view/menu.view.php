<?php

require_once __DIR__ . '/components/Header.php';
?>

<main class="flex flex-col gap-4">
  <section class="flex justify-between items-center">
    <h1 class="text-2xl"><?= esc($title) ?></h1>
    <div>
      <input type="text" placeholder="Search..." id="searchKey"
             value="<?= $paramKey ?? '' ?>"
             class="input input-bordered w-full"/>
    </div>
  </section>

  <section class="w-full">
    <div class="overflow-x-auto">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Description</th>
            <th>Size</th>
            <th>Available</th>
            <th>Discount</th>
            <th>Cals</th>
            <th>Takeaway</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img
                      src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png"
                      alt="Avatar Tailwind CSS Component"/>
                  </div>
                </div>
                <div>
                  <div class="font-bold">Hart Hagerty</div>
                  <div class="text-sm opacity-50">United States</div>
                </div>
              </div>
            </td>
            <td>
              Zemlak, Daniel and Leannon
              <br/>
              <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
            </td>
            <td>Purple</td>
            <th>
              <button class="btn btn-ghost btn-xs">details</button>
            </th>
          </tr>

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

<?php
require_once __DIR__ . '/components/Footer.php'; ?>

