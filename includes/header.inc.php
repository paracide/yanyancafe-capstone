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
    <title><?= esc(SITE_NAME).' - '.esc($title) ?></title>

    <!--favicon-->
    <link href="favicon.png" rel="icon"
          type="image/x-icon">
    <link href="../public/images/favicon/favicon-192.png" rel="apple-touch-icon"
          sizes="192x192">
    <link href="../public/images/favicon/favicon-180.png" rel="apple-touch-icon"
          sizes="180x180">
    <link href="../public/images/favicon/favicon-167.png" rel="apple-touch-icon"
          sizes="167x167">
    <link href="../public/images/favicon/favicon-152.png" rel="apple-touch-icon"
          sizes="152x152">
    <link href="../public/images/favicon/favicon-128.png" rel="apple-touch-icon"
          sizes="128x128">
    <link href="favicon.png" rel="apple-touch-icon"
          sizes="32x32">

    <link href="styles/base.css" media="screen" rel="stylesheet">
    <link href="styles/mobile.css" media="screen" rel="stylesheet">
    <link href="styles/print.css" media="print" rel="stylesheet">
    <link href="styles/<?= esc($cssFileName) ?>.css" media="screen"
          rel="stylesheet">

  </head>
  <body>
    <div class="wrapper">
      <header>
        <img alt="yanyan cafe" height="" id="logo" src="images/logo.webp">
      </header>
      <nav class="transition shadow">
        <div class="web ">
          <span class="gradient-anime">Yanyan Cafe</span>
        </div>
        <div class="content">
            <?php
            $links = [
              'index'    => 'Home',
              'cats'     => 'Cats',
              'menu'     => 'Menu',
              'about'    => 'About',
              'register' => 'Club',
            ]; ?>
            <?php
            foreach ($links as $file => $text): ?>
              <a
                class="<?= $file == 'index' ? 'home-menu' : 'second-menu' ?> <?= $cssFileName == $file ? 'current' : '' ?>"
                href="<?= $file ?>.php"
                title="Yanyan Cafe - <?= $text ?>"><?= $text ?></a>
            <?php
            endforeach; ?>
        </div>

        <div class="user">
          <a href="#">Sign In</a>
        </div>
      </nav>
      <main>
        <div class="intro">
          <h1 class="gradient-anime"><?= esc($title) ?></h1>
          <p></p><?= esc($desc) ?></p>
        </div>
