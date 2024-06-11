<?php

use App\tools\Auth;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Yanyan Cafe - Where sunbeams meet purrs, and the world shrinks to soft paw prints, a haven awaits, woven from stories and
            sleep." name="description">
    <link
      href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Oswald:wght@400;700&display=swap"
      rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css"
          rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <link href="styles/base.css" media="screen" rel="stylesheet">
    <link href="styles/print.css" media="print" rel="stylesheet">
      <?php
      if ( ! empty($cssFileName)): ?>
        <link href="styles/<?= esc($cssFileName) ?>.css" media="screen"
              rel="stylesheet">
      <?php
      endif; ?>

  </head>
  <body>

    <div class="wrapper">
      <nav class="navbar h-16 w-full glass fixed top-0 z-50">
        <div class="navbar-start hidden md:flex gap-4">
          <span class="text-3xl">Yanyan Cafe </span>
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
              <a
                class="<?= esc(
                  $link == 'index' ? 'home-menu'
                    : 'second-menu'
                ) ?> <?= esc(
                  $cssFileName == $link ? 'current'
                    : ''
                ) ?>"
                href="/?p=<?= esc($link) ?>"
                title="Yanyan Cafe - <?= esc($text) ?>"><?= esc($text) ?></a>
            <?php
            endforeach; ?>
        </div>
        <div class="navbar-end hidden md:flex gap-4">
            <?php
            if (Auth::isLoggedIn()): ?>
              <form action="/?p=logout_process" method="post" novalidate>
                <button class="btn glass text-white	 btn-sm" type="submit">
                  Logout
                </button>
              </form>
              <a href="/?p=profile">Profile</a>
              <div class="avatar">
                <div class="w-8 h-8 rounded-full">
                  <img src="images/avatar.webp" alt="avatar"/>
                </div>
              </div>
            <?php
            else: ?>
              <a href="/?p=register">Register</a>
              <a href="/?p=login">Login</a>
            <?php
            endif; ?>
        </div>
        <!--mobile nav-->
        <div class="navbar flex md:hidden">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
              </svg>
            </div>
            <span class="text-xl">Yanyan Cafe - <?= esc($title) ?></span>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <?php
                foreach ($links as $link => $text): ?>
                  <li><a
                      class="<?= esc(
                        $link == 'index' ? 'home-menu'
                          : 'second-menu'
                      ) ?> <?= esc(
                        $cssFileName == $link ? 'current'
                          : ''
                      ) ?>"
                      href="/?p=<?= esc($link) ?>"
                      title="Yanyan Cafe - <?= esc($text) ?>"><?= esc($text) ?>
                    </a></li>
                <?php
                endforeach; ?>


            </ul>
          </div>
        </div>

      </nav>

        <?php
        if (isset($isHomePage) && $isHomePage): ?>
          <header>
            <img alt="yanyan cafe" height="" id="logo" src="images/logo.webp">
          </header>
        <?php
        endif; ?>
      <main>
          <?php
          if (isset($isHomePage) && $isHomePage): ?>
            <div class="intro">
              <h1 class="gradient-anime"><?= esc($title) ?></h1>
              <p></p><?= esc($desc) ?></p>
            </div>
          <?php
          endif; ?>
