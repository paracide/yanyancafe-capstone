<?php

require_once __DIR__ . '/../components/Header.php';
?>
<div class="page" id="reg">
  <div class="card">
    <h1 class="action">Login</h1>
    <form action="/?p=login_process" method="post" novalidate>
      <div class="input-section">
        <div class="input-group">
          <label class="input-label" for="email">Email:</label>
          <input class="input-field" id="email" name="email" type="text"
                 value="<?= esc($post['email'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['email'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="password">Password:</label>
          <input class="input-field" id="password" name="password" type="text">
        </div>


        <div class="input-group">
          <label class="input-label action" for="remember">Remember me</label>
          <input checked id="remember" class="input-field" name="remember"
                 type="checkbox"
                 value="yes">

        </div>
        <div class="action">
          <button class="button flash" type="submit">Log In</button>
        </div>
        <div class="action">
          <button class="button flash"
                  onclick="window.location.href='/?p=register'"
                  style="background: deepskyblue">Create a
            free account
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/../components/Footer.php'; ?>
