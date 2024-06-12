<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= esc(SITE_NAME) . ' - ' . esc($title) ?></title>

    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css"
          rel="stylesheet">
    <link href="admin/admin.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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


  </head>
  <body>
    <!--Toast-->
    <div id="toast-info" hidden class="toast-info">
       <span class="text-sm font-medium">Your data has been saved
            successfully!</span>
    </div>

    <div id="toast-error" hidden class="toast-error">
       <span class="text-sm font-medium">Your data has been saved
            successfully!</span>
    </div>

    <nav
      class="navbar header flex items-center justify-between p-4 bg-primary text-white">
      <div class="navbar-start hidden md:flex gap-4">
        <span class="text-3xl">Dashboard</span>
      </div>
      <div class="navbar-center hidden md:flex gap-16">
          <?php
          $links = [
            'index' => 'Home',
            'cats'  => 'Cats',
            'menu'  => 'Menu',
            'about' => 'About',
            'club'  => 'Club',
          ]; ?>
          <?php
          foreach ($links as $link => $text): ?>
            <a href="/?p=<?= esc($link) ?>"
               title="Yanyan Cafe - <?= esc($text) ?>"><?= esc($text) ?></a>
          <?php
          endforeach; ?>
      </div>
      <div class="navbar-end hidden md:flex gap-4">
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

