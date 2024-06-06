<?php

require_once __DIR__ . '/components/Header.php';
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
          <span class="error-msg"><?= esc($errors['email'][0] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="password">Password:</label>
          <input class="input-field" id="password" name="password"
                 type="password">
          <span class="error-msg"><?= esc(
                $errors['password'][0] ?? ''
              ) ?></span>
        </div>

        <div class="action">
          <button class="button flash" type="submit">Log In</button>
        </div>
        <div class="action">
          <div class="button flash"
                  onclick="window.location.href='/?p=register'"
                  style="background: deepskyblue">Create an account
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>
