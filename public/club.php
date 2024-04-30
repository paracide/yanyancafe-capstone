<?php

require __DIR__.'/../includes/functions.php';
$cssFileName = 'club';
$title       = 'Memories';
$desc        = 'Moonlit paws gather, a tapestry of fur and friendship. Join the clan of cat-kissed souls, weave stories by
            flickering candlelight, and celebrate the magic of nine lives lived in harmony.';
// view starts
require __DIR__.'/../includes/header.inc.php';
?>

  <div class="page club">
    <div class="card club-intro transition">
      <div class="intro-header transition"></div>
      <div class="intro-text">
        <h2>Join Us</h2>
        <div class="transition">Exclusive perks and a purr-fect community
          experience:
        </div>
        <ul class="transition" style="margin: 0">
          <li>Early access to cat-themed events</li>
          <li>Discounts on treats and merchandise</li>
          <li>Regular updates on our adorable cats</li>
        </ul>
      </div>
    </div>
    <div class="card club-reg" id="reg">
      <form action="http://scott-media.com/test/form_display.php"
            class="card-form" method="post">
        <h2 class="action">Get Your Membership</h2>
        <label class="input-label" for="name">Name:</label>
        <input class="input-field" id="name" name="name" required type="text">
        <label class="input-label" for="birthday">Birthday:</label>
        <input class="input-field" id="birthday" name="birthday" required
               type="date">
        <label class="input-label" for="email">Email:</label>
        <input class="input-field" id="email" name="email" required
               type="email">
        <label class="input-label" for="phone">Phone Number:</label>
        <input class="input-field" id="phone" name="phone"
               placeholder="1234567890"
               required type="number">
        <label class="input-label" for="contact_method">Preferred Contact
          Method:</label>
        <select class="input-field" id="contact_method" name="contact_method"
                required>
          <option value="email">Email</option>
          <option value="phone">Phone</option>
        </select>
        <label class="input-label action">
          <input checked class="input-field" name="subscribe" type="checkbox"
                 value="yes">
          Subscribe to newsletter
        </label>
        <div class="action">
          <button class="button flash">Join Us</button>
        </div>
        <div class="card-info action flash">
          By signing up you are agreeing to our <a href="#">Terms and
            Conditions</a>
        </div>
      </form>
    </div>
  </div>


<?php
require __DIR__.'/../includes/footer.inc.php'; ?>
