<?php

?>
<!DOCTYPE html>
<html lang="en" data-theme="sunset">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= esc(SITE_NAME) . ' - ' . esc($title) ?></title>
    <!--favicon-->
    <link href="favicon.png" rel="icon"
          type="image/x-icon">
    <link href="images/favicon/favicon-192.png" rel="apple-touch-icon"
          sizes="192x192">
    <link href="images/favicon/favicon-180.png" rel="apple-touch-icon"
          sizes="180x180">
    <link href="images/favicon/favicon-167.png" rel="apple-touch-icon"
          sizes="167x167">
    <link href="images/favicon/favicon-152.png" rel="apple-touch-icon"
          sizes="152x152">
    <link href="images/favicon/favicon-128.png" rel="apple-touch-icon"
          sizes="128x128">
    <link href="favicon.png" rel="apple-touch-icon"
          sizes="32x32">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css"
          rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/admin/global.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>
  <body>
    <!--Toast-->
    <header>
      <nav
        class="navbar h-16 w-full glass fixed top-0 z-50">
        <div class="navbar-start">
          <a class="text-xl" href="/admin"><?= esc(
                SITE_NAME
              ) ?></a>
        </div>
        <div class="navbar-center flex gap-16 text-xl">
            <?php
            $links = [
              'index'  => 'Dashboard',
              'menu'   => 'Menu',
              'user'   => 'User',
              'orders' => 'Orders',
            ]; ?>
            <?php
            foreach ($links as $link => $text): ?>
              <a href="/admin?/p=<?= esc($link) ?>"
                 class="<?= ($link === ($_GET['p'] ?? '')) ? 'text-primary'
                   : '' ?>"
                 title="Yanyan Dashboard <?= esc($text) ?>"><?= esc(
                    $text
                  ) ?></a>
            <?php
            endforeach; ?>
        </div>
        <div class="navbar-end flex gap-4">
          <form action="/?p=logout_process" method="post" novalidate>
            <button class="btn btn-ghost text-xl btn-sm" type="submit">
              Logout
            </button>
          </form>
          <div class="avatar">
            <div class="w-8 h-8 rounded-full">
              <img src="images/avatar.webp" alt="avatar"/>
            </div>
          </div>
        </div>
      </nav>
    </header>

