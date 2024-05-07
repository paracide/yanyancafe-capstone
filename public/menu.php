<?php

require_once __DIR__.'/../includes/config.php';
$cssFileName = 'menu';
$title       = 'Happy Hour';
$isHomePage  = true;
$desc        = 'Where whispers of cinnamon dance with whispers of tea, concoctions for
      weary souls and hearts seeking
      solace.';
// view starts
require_once __DIR__.'/../includes/header.inc.php';
?>


<div class="page menu" id="coffee">
  <div class="menu-wrapper1">
    <div class="menu-wrapper2">
      <div class="button current-button  flash"><a href="#coffee">Coffee</a>
      </div>
      <div class="button  flash"><a href="#snack">Snack</a></div>
      <div class="button  flash"><a href="#beverage">Beverage</a></div>
      <div class="menu-group">
        <h2>Classic Coffees</h2>
        <hr>
        <ul>
          <li>Americano - $3.50</li>
          <li>Latte - $4.00</li>
          <li>Cappuccino - $4.50</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>Pour-Over Coffees</h2>
        <hr>
        <ul>
          <li>Colombian Pour-Over - $5.00</li>
          <li>Kenyan AA Pour-Over - $5.50</li>
          <li>Indian Mandheling Pour-Over - $6.00</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>
          Specialty Lattes
        </h2>
        <hr>
        <ul>
          <li>Chocolate Latte - $4.50</li>
          <li>Cinnamon Latte - $5.00</li>
          <li>Hazelnut Latte - $5.50</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="page menu" id="snack">
  <div class="menu-wrapper1">
    <div class="menu-wrapper2">
      <div class="button flash"><a href="#coffee">Coffee</a></div>
      <div class="button flash current-button"><a href="#snack">Snack</a>
      </div>
      <div class="button flash"><a href="#beverage">Beverage</a></div>
      <div class="menu-group">
        <h2>Bakery Delights</h2>
        <hr>
        <ul>
          <li>Croissant - $2.50</li>
          <li>Chocolate Danish - $3.00</li>
          <li>Blueberry Muffin - $2.75</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>Handheld Snacks</h2>
        <hr>

        <ul>
          <li>Turkey Club Sandwich - $7.50</li>
          <li>Vegetarian Panini - $6.50</li>
          <li>Chicken Caesar Wrap - $8.00</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>Sweet Treats</h2>
        <hr>
        <ul>
          <li>Chocolate Chip Cookie - $1.50</li>
          <li>Fruit Parfait - $5.00</li>
          <li>Caramel Brownie - $3.50</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="page menu" id="beverage">
  <div class="menu-wrapper1">
    <div class="menu-wrapper2">
      <div class="button flash"><a href="#coffee">Coffee</a></div>
      <div class="button flash"><a href="#snack">Snack</a></div>
      <div class="button flash current-button"><a
          href="#beverage">Beverage</a></div>
      <div class="menu-group">
        <h2>Tea Selection</h2>
        <hr>
        <ul>
          <li>Black Tea - $2.50</li>
          <li>Green Tea - $3.00</li>
          <li>Chai Latte - $4.00</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>Cold Drinks</h2>
        <hr>
        <ul>
          <li>Iced Tea - $3.50</li>
          <li>Fruit Smoothie - $5.00</li>
          <li>Lemonade - $3.00</li>
        </ul>
      </div>
      <div class="menu-group">
        <h2>Juices</h2>
        <hr>
        <ul>
          <li>Orange Juice - $3.50</li>
          <li>Apple Juice - $3.00</li>
          <li>Carrot Ginger Juice - $4.00</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php
require_once __DIR__.'/../includes/footer.inc.php'; ?>
