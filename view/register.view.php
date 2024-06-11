<?php

// view starts
require_once __DIR__ . '/components/Header.php';
?>
<div class="p-8 mt-16" id="reg">
  <div class="m-card grid">
    <h1 class="text-4xl action">Get Your Membership</h1>
    <form class="grid grid-cols-1 md:grid-cols-2" action="/?p=register_process"
          method="post" novalidate>
      <div class="input-section">
        <div class="input-group">
          <label class="input-label" for="email">Email:</label>
          <input class="input-field" id="email" name="email" type="text"
                 value="<?= esc($post['email'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['email'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="password">Password:</label>
          <input class="input-field" id="password" name="password"
                 type="password"
                 value="<?= esc($post['password'] ?? '') ?>"
          >
          <span class="error-msg"><?= esc($errors['password'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="confirm_password">Confirm
            Password:</label>
          <input class="input-field" id="confirm_password"
                 name="confirm_password" type="password"
                 value="<?= esc($post['confirm_password'] ?? '') ?>"
          >
          <span class="error-msg"><?= esc(
                $errors['confirm_password'] ?? ''
              ) ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="first_name">First Name:</label>
          <input class="input-field" id="first_name" name="first_name"
                 type="text"
                 value="<?= esc($post['first_name'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['first_name'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="last_name">Last Name:</label>
          <input class="input-field" id="last_name" name="last_name" type="text"
                 value="<?= esc($post['last_name'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['last_name'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="birthday">Birthday:</label>
          <input class="input-field" id="birthday" name="birthday" type="date"
                 value="<?= esc($post['birthday'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['birthday'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="phone">Phone:</label>
          <input class="input-field" id="phone" name="phone" type="text"
                 value="<?= esc($post['phone'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['phone'] ?? '') ?></span>
        </div>
      </div>

      <div class="input-section">
        <div class="input-group">
          <label class="input-label" for="street">Street:</label>
          <input class="input-field" id="street" name="street" type="text"
                 value="<?= esc($post['street'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['street'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="province">Province:</label>
          <input class="input-field" id="province" name="province" type="text"
                 value="<?= esc($post['province'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['province'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="country">Country:</label>
          <input class="input-field" id="country" name="country" type="text"
                 value="<?= esc($post['country'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['country'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="city">City:</label>
          <input class="input-field" id="city" name="city" type="text"
                 value="<?= esc($post['city'] ?? '') ?>">
          <span class="error-msg"><?= esc($errors['city'] ?? '') ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="postal_code">Postal Code:</label>
          <input class="input-field" id="postal_code" name="postal_code"
                 type="text"
                 value="<?= esc($post['postal_code'] ?? '') ?>">
          <span class="error-msg"><?= esc(
                $errors['postal_code'] ?? ''
              ) ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="subscribe_to_newsletter">Subscribe to
            Newsletter:</label>
          <input class="input-field" id="subscribe_to_newsletter"
                 name="subscribe_to_newsletter"
                 type="radio"
                 value="1" <?= isset($post['subscribe_to_newsletter'])
                               && $post['subscribe_to_newsletter'] ? 'checked'
            : '' ?>>
        </div>

        <button class="button flash">Create Account</button>
      </div>
    </form>
  </div>
</div>

<?php
require_once __DIR__ . '/components/Footer.php'; ?>
