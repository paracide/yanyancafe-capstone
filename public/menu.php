<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Yanyan Cafe - Menu</title>

    <meta content="Where whispers of cinnamon dance with whispers of tea, concoctions for weary souls and hearts seeking
            solace. Quench your thirst with moonlit brews and sun-kissed pastries, a symphony of flavors for every
            fancy" name="description">
    <!--favicon-->
    <link href="favicon.png" rel="icon" type="image/x-icon">
    <link href="favicon-192.png" rel="apple-touch-icon" sizes="192x192">
    <link href="favicon-180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="favicon-167.png" rel="apple-touch-icon" sizes="167x167">
    <link href="favicon-152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="favicon-128.png" rel="apple-touch-icon" sizes="128x128">
    <link href="favicon.png" rel="apple-touch-icon" sizes="32x32">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Oswald:wght@400;700&display=swap"
          rel="stylesheet">
    <link href="styles/base.css" rel="stylesheet">
    <link href="styles/menu.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/print.css" media="print" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <img alt="yanyan cafe" id="logo" src="images/logo.png">
      </header>
      <nav class="transition shadow">
        <div class="transition">
          <div class="menu-shape" id="menu-top"></div>
        </div>
        <a class="home-menu" href="index.php" title="Yanyan Cafe - Home">Home</a>
        <a class="second-menu" href="cats.php" title="Yanyan Cafe - Cats">Cats</a>
        <a class="second-menu" href="menu.html" title="Yanyan Cafe - Menu">Menu</a>
        <a class="second-menu" href="about.php" title="Yanyan Cafe - About">About</a>
        <a class="second-menu" href="club.php" title="Yanyan Cafe - Club">Club</a>
      </nav>

      <main>
        <div class="intro">
          <h1 class="gradient-anime">Happy Hour</h1>
          <p>
            Where whispers of cinnamon dance with whispers of tea, concoctions for weary souls and hearts seeking
            solace.
          </p>
        </div>

        <div class="page menu" id="coffee">
          <div class="menu-wrapper1">
            <div class="menu-wrapper2">
              <div class="button current-button  flash"><a href="#coffee">Coffee</a></div>
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
              <div class="button flash current-button"><a href="#snack">Snack</a></div>
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
              <div class="button flash current-button"><a href="#beverage">Beverage</a></div>
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
      </main>

      <footer>
        <div class="follow-us">
          <div>Follow us for daily doses of feline charm! 🐾</div>
          <div class="social-media">
            <a href="#" title="Yanyan Cafe - Facebook">
              <img alt="facebook" src="images/social-media/facebook.svg">
            </a>
            <a href="#" title="Yanyan Cafe - Twitter">
              <img alt="twitter" src="images/social-media/twitter.svg">
            </a>
            <a href="#" title="Yanyan Cafe - Youtube">
              <img alt="youtube" src="images/social-media/youtube.svg">
            </a>
          </div>
        </div>
        <div class="copyright">Copyright &copy;2023 - Night Fae Studio</div>
        <div class="contact-us">
          <div>paracidex@gmail.com</div>
        </div>

      </footer>
    </div>
  </body>
</html>
