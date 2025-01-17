<?php

require_once __DIR__ . '/components/Header.php';
?>

<div class="home-cats-container page">
  <h2>CATS</h2>
  <p>Meet our exclusive "Cat Royalty" members, carefully chosen for
    enchanting companionship.</p>
  <div class="home-cat-card-group">
    <div class="home-cat-card border shadow" id="xiuxiu">
      <img alt="xiuxiu" src="images/home/xiuxiu.webp">
      <div class="home-card-text">
        <div class="home-cat-title border">Baby
        </div>
        <div class="card-line"></div>
        <a class="button flash" href="/?p=cats#xiuxiu-page"
           title="Cats xiuxiu">Xiuxiu</a>
      </div>
    </div>
    <div class="home-cat-card border shadow" id="huabi">
      <img alt="huabi" src="images/home/huabi.webp">
      <div class="home-card-text">
        <div class="home-cat-title border">Evil</div>
        <div class="card-line"></div>
        <a class="button  flash" href="/?p=cats#huabi-page"
           title="Cats huabi">Huabi</a>
      </div>
    </div>
    <div class="home-cat-card border shadow" id="zhangmeili">
      <img alt="zhangmeili" src="images/home/zhangmeili.webp">
      <div class="home-card-text">
        <div class="home-cat-title border">Angel</div>
        <div class="card-line"></div>
        <a class="button  flash" href="/?p=cats#ml-page"
           title="Cats zhangmeili">Zhangmeili</a>
      </div>
    </div>
    <div class="home-cat-card border shadow" id="pipi">
      <img alt="pipi" src="images/home/pipi.webp">
      <div class="home-card-text">
        <div class="home-cat-title border">Silly</div>
        <div class="card-line"></div>
        <a class="button  flash" href="/?p=cats#pipi-page"
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
    <a class="button flash" href="/p?=menu#coffee"
       title="Yanyan Cafe - Menu Coffee">Explore</a>
  </div>
  <div class="border menu-img-container transition" id="donut">
    <h3>SNACK</h3>
    <a class="button flash" href="/p?=menu#snack"
       title="Yanyan Cafe - Menu Snack">Explore</a>
  </div>

  <div class="border menu-img-container transition" id="beverage">
    <h3>BEVERAGES</h3>
    <a class="button flash" href="/p?=menu#beverage"
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
      <img alt="us" class="border" src="images/home/us.webp">
    </div>
  </div>
</div>
<?php
require_once __DIR__ . '/components/Footer.php'; ?>

