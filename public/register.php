<?php

require __DIR__.'/../includes/config.php';
$cssFileName = 'register';
$title       = 'Join Us';
$desc        = '';
// view starts
require __DIR__.'/../includes/header.inc.php';
?>
<div class="page" id="reg">
  <div class="card">
    <h2 class="action">Get Your Membership</h2>

    <form action="services/registerSvr.php" method="post" novalidate>
      <div class="input-section">
        <div class="input-group">
          <label class="input-label" for="email">Email:</label>
          <input class="input-field" id="email" name="email" type="text" value="<?= $post['email'] ?? '' ?>">
          <span class="error-msg"><?= $errors['email'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="password">Password:</label>
          <input class="input-field" id="password" name="password" type="password">
          <span class="error-msg"><?= $errors['password'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="first_name">First Name:</label>
          <input class="input-field" id="first_name" name="first_name" type="text" value="<?= $post['first_name'] ?? '' ?>">
          <span class="error-msg"><?= $errors['first_name'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="last_name">Last Name:</label>
          <input class="input-field" id="last_name" name="last_name" type="text" value="<?= $post['last_name'] ?? '' ?>">
          <span class="error-msg"><?= $errors['last_name'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="birthday">Birthday:</label>
          <input class="input-field" id="birthday" name="birthday" type="date" value="<?= $post['birthday'] ?? '' ?>">
          <span class="error-msg"><?= $errors['birthday'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="phone">Phone:</label>
          <input class="input-field" id="phone" name="phone" type="text" value="<?= $post['phone'] ?? '' ?>">
          <span class="error-msg"><?= $errors['phone'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="gender">Gender:</label>
          <select class="input-field" id="gender" name="gender">
            <option value="male" <?= isset($post['gender']) && $post['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
            <option value="female" <?= isset($post['gender']) && $post['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
            <option value="non-binary" <?= isset($post['gender']) && $post['gender'] == 'non-binary' ? 'selected' : '' ?>>Non-Binary</option>
            <option value="unspecified" <?= isset($post['gender']) && $post['gender'] == 'unspecified' ? 'selected' : '' ?>>Unspecified</option>
          </select>
          <span class="error-msg"><?= $errors['gender'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="subscribe_to_newsletter">Subscribe to Newsletter:</label>
          <input class="input-field" id="subscribe_to_newsletter" name="subscribe_to_newsletter" type="checkbox" <?= isset($post['subscribe_to_newsletter']) && $post['subscribe_to_newsletter'] ? 'checked' : '' ?>>
        </div>
      </div>

      <div class="input-section">
        <div class="input-group">
          <label class="input-label" for="street">Street:</label>
          <input class="input-field" id="street" name="street" value="<?= $post['street'] ?? '' ?>">
          <span class="error-msg"><?= $errors['street'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="province">Province:</label>
          <input class="input-field" id="province" name="province" type="text" value="<?= $post['province'] ?? '' ?>">
          <span class="error-msg"><?= $errors['province'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="country">Country:</label>
          <input class="input-field" id="country" name="country" type="text" value="<?= $post['country'] ?? '' ?>">
          <span class="error-msg"><?= $errors['country'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="city">City:</label>
          <input class="input-field" id="city" name="city" type="text" value="<?= $post['city'] ?? '' ?>">
          <span class="error-msg"><?= $errors['city'] ?? '' ?></span>
        </div>

        <div class="input-group">
          <label class="input-label" for="postal_code">Postal Code:</label>
          <input class="input-field" id="postal_code" name="postal_code" type="text" value="<?= $post['postal_code'] ?? '' ?>">
          <span class="error-msg"><?= $errors['postal_code'] ?? '' ?></span>
        </div>

        <button class="button flash">Join Us</button>
      </div>
    </form>

  </div>

</div>


<?php
require __DIR__.'/../includes/footer.inc.php'; ?>
