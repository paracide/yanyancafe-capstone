<?php

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

?>
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
