<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Yanyan Cafe - Club</title>
    <meta content="Moonlit paws gather, a tapestry of fur and friendship. Join the clan of cat-kissed souls, weave stories by
            flickering candlelight, and celebrate the magic of nine lives lived in harmony" name="description">
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
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/club.css" rel="stylesheet">
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
        <a class="second-menu" href="menu.php" title="Yanyan Cafe - Menu">Menu</a>
        <a class="second-menu" href="about.php" title="Yanyan Cafe - About">About</a>
        <a class="second-menu" href="club.html" title="Yanyan Cafe - Club">Club</a>
      </nav>

      <main>
        <div class="intro">
          <h1 class="gradient-anime">Memories</h1>
          <p>Moonlit paws gather, a tapestry of fur and friendship. Join the clan of cat-kissed souls, weave stories by
            flickering candlelight, and celebrate the magic of nine lives lived in harmony.</p>
        </div>

        <div class="page club">
          <div class="card club-intro transition">
            <div class="intro-header transition"></div>
            <div class="intro-text">
              <h2>Join Us</h2>
              <div class="transition">Exclusive perks and a purr-fect community experience:</div>
              <ul class="transition" style="margin: 0">
                <li>Early access to cat-themed events</li>
                <li>Discounts on treats and merchandise</li>
                <li>Regular updates on our adorable cats</li>
              </ul>
            </div>
          </div>
          <div class="card club-reg" id="reg">
            <form action="http://scott-media.com/test/form_display.php" class="card-form" method="post">
              <h2 class="action">Get Your Membership</h2>
              <label class="input-label" for="name">Name:</label>
              <input class="input-field" id="name" name="name" required type="text">
              <label class="input-label" for="birthday">Birthday:</label>
              <input class="input-field" id="birthday" name="birthday" required type="date">
              <label class="input-label" for="email">Email:</label>
              <input class="input-field" id="email" name="email" required type="email">
              <label class="input-label" for="phone">Phone Number:</label>
              <input class="input-field" id="phone" name="phone" placeholder="1234567890"
                     required type="number">
              <label class="input-label" for="contact_method">Preferred Contact Method:</label>
              <select class="input-field" id="contact_method" name="contact_method" required>
                <option value="email">Email</option>
                <option value="phone">Phone</option>
              </select>
              <label class="input-label action">
                <input checked class="input-field" name="subscribe" type="checkbox" value="yes">
                Subscribe to newsletter
              </label>
              <div class="action">
                <button class="button flash">Join Us</button>
              </div>
              <div class="card-info action flash">
                By signing up you are agreeing to our <a href="#">Terms and Conditions</a>
              </div>
            </form>
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
