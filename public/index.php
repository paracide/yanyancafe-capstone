<?php

require __DIR__.'/../includes/functions.php';
$cssFileName = 'index';
$title       = 'Yanyan Cafe';
// view starts
require __DIR__.'/../includes/header.inc.php';
?>
<main>
  <div class="intro">
    <h1 class="gradient-anime"><?= esc($title) ?></h1>
    <p>
      Where sunbeams meet purrs, and the world shrinks to soft paw prints,
      a haven awaits, woven from stories and
      sleep.
    </p>
  </div>

  <div class="home-cats-container page">
    <h2>CATS</h2>
    <p>Meet our exclusive "Cat Royalty" members, carefully chosen for
      enchanting companionship.</p>
    <div class="home-cat-card-group">
      <div class="home-cat-card border shadow" id="xiuxiu">
        <img alt="xiuxiu" src="images/home/xiuxiu.jpg">
        <div class="home-card-text">
          <div class="home-cat-title border">Baby

          </div>
          <div class="card-line"></div>
          <a class="button flash" href="cats.php#xiuxiu-page"
             title="Cats xiuxiu">Xiuxiu</a>
        </div>
      </div>
      <div class="home-cat-card border shadow" id="huabi">
        <img alt="huabi" src="images/home/huabi.jpg">
        <div class="home-card-text">
          <div class="home-cat-title border">Evil</div>
          <div class="card-line"></div>
          <a class="button  flash" href="cats.php#huabi-page"
             title="Cats huabi">Huabi</a>
        </div>
      </div>
      <div class="home-cat-card border shadow" id="zhangmeili">
        <img alt="zhangmeili" src="images/home/zhangmeili.jpg">
        <div class="home-card-text">
          <div class="home-cat-title border">Angel</div>
          <div class="card-line"></div>
          <a class="button  flash" href="cats.php#ml-page"
             title="Cats zhangmeili">Zhangmeili</a>
        </div>
      </div>
      <div class="home-cat-card border shadow" id="pipi">
        <img alt="pipi" src="images/home/pipi.jpg">
        <div class="home-card-text">
          <div class="home-cat-title border">Silly</div>
          <div class="card-line"></div>
          <a class="button  flash" href="cats.php#pipi-page"
             title="Cats pipi">Pipi</a>
        </div>
      </div>
    </div>
  </div>

  <div class="home-menu-container page">
    <h2>MENU</h2>

    <p id="menu-intro">Indulge in a delightful culinary experience with
      YanYan Cafe's innovative menu, featuring
      carefully
      curated beverages and snacks.
    </p>
    <div class="border menu-img-container transition" id="coffee">
      <h3>COFFEE</h3>
      <a class="button flash" href="menu.php#coffee"
         title="Yanyan Cafe - Menu Coffee">Explore</a>
    </div>
    <div class="border menu-img-container transition" id="donut">
      <h3>SNACK</h3>
      <a class="button flash" href="menu.php#snack"
         title="Yanyan Cafe - Menu Snack">Explore</a>
    </div>

    <div class="border menu-img-container transition" id="beverage">
      <h3>BEVERAGES</h3>
      <a class="button flash" href="menu.php#beverage"
         title="Yanyan Cafe - Menu Beverages">Explore</a>
    </div>
  </div>

  <div class="home-us-container page">
    <div class="home-us-wrapper">
      <h2>ABOUT US</h2>
      <p>Welcome to YanYan Cafe, where passion for felines meets the love
        for a good cuppa! Nestled in the heart
        of Winnipeg, we are a cozy space dedicated to creating memorable
        moments with our charming cats.
      </p>
      <div id="us-img">
        <img alt="us" class="border" src="images/home/us.jpg">
      </div>
    </div>
  </div>
</main>
<?php
require __DIR__.'/../includes/footer.inc.php'; ?>

