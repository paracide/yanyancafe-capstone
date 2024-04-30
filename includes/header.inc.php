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
    <title><?= esc($title) ?></title>

    <!--favicon-->
    <link href="favicon.png" rel="icon" type="image/x-icon">
    <link href="favicon-192.png" rel="apple-touch-icon" sizes="192x192">
    <link href="favicon-180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="favicon-167.png" rel="apple-touch-icon" sizes="167x167">
    <link href="favicon-152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="favicon-128.png" rel="apple-touch-icon" sizes="128x128">
    <link href="favicon.png" rel="apple-touch-icon" sizes="32x32">

    <link href="styles/base.css" media="screen" rel="stylesheet">
    <link href="styles/mobile.css" media="screen" rel="stylesheet">
    <link href="styles/print.css" media="print" rel="stylesheet">
    <link href="styles/<?= esc($cssFileName) ?>.css" media="screen" rel="stylesheet">

  </head>
  <body>
    <div class="wrapper">
      <header>
        <img alt="yanyan cafe" height="" id="logo" src="images/logo.png">
      </header>
      <nav class="transition shadow">
        <div class="transition">
          <div class="menu-shape" id="menu-top"></div>
        </div>
        <a class="home-menu" href="index.php"
           title="Yanyan Cafe - Home">Home</a>
        <a class="second-menu" href="cats.php"
           title="Yanyan Cafe - Cats">Cats</a>
        <a class="second-menu" href="menu.php"
           title="Yanyan Cafe - Menu">Menu</a>
        <a class="second-menu" href="about.php"
           title="Yanyan Cafe - About">About</a>
        <a class="second-menu" href="club.php"
           title="Yanyan Cafe - Club">Club</a>
      </nav>
