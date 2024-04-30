<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Yanyan Cafe - Where sunbeams meet purrs, and the world shrinks to soft paw prints, a haven awaits, woven from stories and
            sleep." name="description">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Oswald:wght@400;700&display=swap"
          rel="stylesheet">
    <title>Yanyan Cafe - Home</title>

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

    <!--desktop-->
    <style media="screen">
      h1 {
        font-size: 10rem;
      }

      h2 {
        font-size: 4rem;
      }

      h3 {
        font-size: 1.5rem;
      }

      h4 {
        font-size: 1.5rem;
      }

      p {
        padding: 0 1rem;
      }


      /*cats*/
      .home-cats-container {
        background-color: #ffffff;
        grid-template-rows: 1fr 1fr 6fr;
        place-items: center;
      }

      .home-cats-container .home-cat-card-group {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2vw;
      }

      .home-cats-container .home-cat-card {
        width: 20vw;
        height: 60vh;
        background-size: cover;
        overflow: hidden;
        color: #ffffff;
        position: relative;
        display: inline-block;
        /*make the text on the image*/
      }


      .home-cats-container .home-cat-card img {
        height: 100%;
        width: 100%;
        filter: grayscale(0.3);
        object-fit: cover;
        transition: all 0.3s ease-in-out;
      }

      .home-cats-container .home-cat-card:hover img {
        transform: scale(1.1);
        filter: grayscale(0);
      }

      .home-cats-container .home-cat-card .home-card-text {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        text-align: center;
        display: grid;
        grid-template-rows: 10fr 10fr 2fr;
        place-items: baseline center;
        padding: 1rem;
      }

      .home-cat-title {
        background: rgba(0, 0, 0, 0.5);
        width: 60%;
        border-radius: 10px;
      }


      .home-cats-container .card-line {
        height: 1px;
        width: 50%;
        background: #ffffff;
      }

      /*menu*/
      .home-menu-container {
        grid-template-columns: 3fr 2fr 2fr;
        grid-gap: 1rem;
        background: #cccccc;
        place-items: center;
      }


      .home-menu-container .menu-img-container {
        display: grid;
        width: 100%;
        height: 100%;
        color: #ffffff;
        grid-template-rows: 5fr 2fr;
        place-items: center;
        filter: sepia(0.2);
      }

      .home-menu-container h3 {
        background: rgba(0, 0, 0, 0.5);
        padding: 0.5rem 1rem;
        border-radius: 10px;
      }

      .home-menu-container .menu-img-container:hover {
        filter: sepia(0);
      }

      #menu-intro {
        grid-row: 2/3;
      }

      #coffee {
        grid-column: 2/3;
        grid-row: 1/3;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background: url("images/home/coffee.jpg");
        background-size: cover;
      }


      #donut {
        width: 100%;
        height: 100%;
        background: url("images/home/donut.jpg");
        background-size: cover;
      }

      #beverage {
        width: 100%;
        height: 100%;
        background: url("images/home/beverage.jpg");
        background-size: cover;
      }

      /*about us*/
      .home-us-container {
        place-items: center;
      }

      .home-us-container .home-us-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        place-items: center;
        background: #fff;
        width: 90vw;
        height: 70vh;
        border-radius: 10px;
        padding: 5vw;
      }

      .home-us-container .home-us-wrapper #us-img {
        grid-row: 1/3;
        grid-column: 2/3;
        overflow: hidden;
      }

      .home-us-container .home-us-wrapper #us-img img {
        width: 100%;
        height: 100%;
      }
    </style>

    <!--mobile-->
    <style>
      @media screen and (max-width: 767px) {
        /*smaller font size for title*/
        h1 {
          font-size: 4rem;
        }

        h2 {
          font-size: 3rem;
        }

        /*cats have fixed width and height in mobile*/
        .home-cats-container .home-cat-card {
          width: 44vw;
          height: 30vh;
        }


        /*cat card two column in mobile*/
        .home-cats-container .home-cat-card-group {
          grid-template-columns: repeat(2, 1fr);
        }

        /*menu 1 column in mobile*/
        .home-menu-container {
          grid-template-columns: 1fr;
        }

        /*menu img have the same height in mobile*/
        .home-menu-container .menu-img-container {
          height: 15vh;
        }

        /*make them normal order*/
        #menu-intro, #coffee, #donut, #beverage {
          grid-column: unset;
          grid-row: unset;
        }

        /*us 1 column*/
        .home-us-container .home-us-wrapper {
          grid-template-columns: 1fr;
        }


        .home-us-container .home-us-wrapper #us-img {
          grid-row: unset;
          grid-column: unset;
          overflow: hidden;
        }

      }
    </style>
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
        <a class="home-menu" href="index.html" title="Yanyan Cafe - Home">Home</a>
        <a class="second-menu" href="cats.php" title="Yanyan Cafe - Cats">Cats</a>
        <a class="second-menu" href="menu.php" title="Yanyan Cafe - Menu">Menu</a>
        <a class="second-menu" href="about.php" title="Yanyan Cafe - About">About</a>
        <a class="second-menu" href="club.php" title="Yanyan Cafe - Club">Club</a>
      </nav>
      <main>
        <div class="intro">
          <h1 class="gradient-anime">Yanyan Cafe</h1>
          <p>
            Where sunbeams meet purrs, and the world shrinks to soft paw prints, a haven awaits, woven from stories and
            sleep.
          </p>
        </div>

        <div class="home-cats-container page">
          <h2>CATS</h2>
          <p>Meet our exclusive "Cat Royalty" members, carefully chosen for enchanting companionship.</p>
          <div class="home-cat-card-group">
            <div class="home-cat-card border shadow" id="xiuxiu">
              <img alt="xiuxiu" src="images/home/xiuxiu.jpg">
              <div class="home-card-text">
                <div class="home-cat-title border">Baby

                </div>
                <div class="card-line"></div>
                <a class="button flash" href="cats.php#xiuxiu-page" title="Cats xiuxiu">Xiuxiu</a>
              </div>
            </div>
            <div class="home-cat-card border shadow" id="huabi">
              <img alt="huabi" src="images/home/huabi.jpg">
              <div class="home-card-text">
                <div class="home-cat-title border">Evil</div>
                <div class="card-line"></div>
                <a class="button  flash" href="cats.php#huabi-page" title="Cats huabi">Huabi</a>
              </div>
            </div>
            <div class="home-cat-card border shadow" id="zhangmeili">
              <img alt="zhangmeili" src="images/home/zhangmeili.jpg">
              <div class="home-card-text">
                <div class="home-cat-title border">Angel</div>
                <div class="card-line"></div>
                <a class="button  flash" href="cats.php#ml-page" title="Cats zhangmeili">Zhangmeili</a>
              </div>
            </div>
            <div class="home-cat-card border shadow" id="pipi">
              <img alt="pipi" src="images/home/pipi.jpg">
              <div class="home-card-text">
                <div class="home-cat-title border">Silly</div>
                <div class="card-line"></div>
                <a class="button  flash" href="cats.php#pipi-page" title="Cats pipi">Pipi</a>
              </div>
            </div>
          </div>
        </div>

        <div class="home-menu-container page">
          <h2>MENU</h2>

          <p id="menu-intro">Indulge in a delightful culinary experience with YanYan Cafe's innovative menu, featuring
            carefully
            curated beverages and snacks.
          </p>
          <div class="border menu-img-container transition" id="coffee">
            <h3>COFFEE</h3>
            <a class="button flash" href="menu.php#coffee" title="Yanyan Cafe - Menu Coffee">Explore</a>
          </div>
          <div class="border menu-img-container transition" id="donut">
            <h3>SNACK</h3>
            <a class="button flash" href="menu.php#snack" title="Yanyan Cafe - Menu Snack">Explore</a>
          </div>

          <div class="border menu-img-container transition" id="beverage">
            <h3>BEVERAGES</h3>
            <a class="button flash" href="menu.php#beverage" title="Yanyan Cafe - Menu Beverages">Explore</a>
          </div>
        </div>

        <div class="home-us-container page">
          <div class="home-us-wrapper">
            <h2>ABOUT US</h2>
            <p>Welcome to YanYan Cafe, where passion for felines meets the love for a good cuppa! Nestled in the heart
              of Winnipeg, we are a cozy space dedicated to creating memorable moments with our charming cats.
            </p>
            <div id="us-img">
              <img alt="us" class="border" src="images/home/us.jpg">
            </div>
          </div>
        </div>
      </main>
      <footer>
        <div class="follow-us">
          <div>Follow us for daily doses of feline charm!</div>
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
          <div id="last_modified">
            <script>
              document.scripts[document.scripts.length - 1].parentNode.innerHTML = "Last Modified: " + document.lastModified;
            </script>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
