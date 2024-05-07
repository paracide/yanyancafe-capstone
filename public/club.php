<?php

require_once __DIR__.'/../includes/config.php';
$cssFileName = 'club';
$title       = 'Memories';
$isHomePage  = true;
$desc        = 'Moonlit paws gather, a tapestry of fur and friendship. Join the clan of cat-kissed souls, weave stories by
            flickering candlelight, and celebrate the magic of nine lives lived in harmony.';
// view starts
require_once __DIR__.'/../includes/header.inc.php';
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
      <h2 class="action">Account login:</h2>
      <label class="input-label" for="email">Email:</label>
      <input class="input-field" id="email" name="email" require_onced
             type="email">
      <label class="input-label" for="password">Password:</label>
      <input class="input-field" id="password" name="password" require_onced
             type="password">

      <label class="input-label action">
        <input checked class="input-field" name="remember" type="checkbox"
               value="yes">
        Remember me on this device
      </label>

      <div class="action">
        <button class="button flash">Log In</button>
      </div>
      <div class="action">
        <button class="button flash" style="background: deepskyblue">Create a
          free account
        </button>
      </div>
    </form>
  </div>
</div>


<?php
require_once __DIR__.'/../includes/footer.inc.php'; ?>
