<?php

require __DIR__.'/../includes/config.php';
$cssFileName = 'register';
$title       = 'Join Us';
$desc        = '';
// view starts
require __DIR__.'/../includes/header.inc.php';
?>
<div class="page">
  <div class="card">
    <h2 class="action">Get Your Membership</h2>

    <form action="#"
          method="post" novalidate>
      <div>
        <label class="input-label" for="email">Email:</label>
        <input class="input-field" id="email" name="email" type="text">

        <label class="input-label" for="password">Password:</label>
        <input class="input-field" id="password" name="password"
               type="password">

        <label class="input-label" for="first_name">First Name:</label>
        <input class="input-field" id="first_name" name="first_name"
               type="text">

        <label class="input-label" for="last_name">Last Name:</label>
        <input class="input-field" id="last_name" name="last_name" type="text">

        <label class="input-label" for="birthday">Birthday:</label>
        <input class="input-field" id="birthday" name="birthday" type="date">

        <label class="input-label" for="phone">Phone:</label>
        <input class="input-field" id="phone" name="phone" type="text">

        <label class="input-label" for="gender">Gender:</label>
        <select class="input-field" id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="non-binary">Non-Binary</option>
          <option value="unspecified">Unspecified</option>
        </select>

        <label class="input-label" for="subscribe_to_newsletter">Subscribe to
          Newsletter:</label>
        <input class="input-field" id="subscribe_to_newsletter"
               name="subscribe_to_newsletter" type="checkbox">
      </div>

      <div>
        <label class="input-label" for="street">Street:</label>
        <input class="input-field" id="street" name="street"></input>

        <label class="input-label" for="province">Province:</label>
        <input class="input-field" id="province" name="province" type="text">

        <label class="input-label" for="country">Country:</label>
        <input class="input-field" id="country" name="country" type="text">

        <label class="input-label" for="city">City:</label>
        <input class="input-field" id="city" name="city" type="text">

        <label class="input-label" for="postal_code">Postal Code:</label>
        <input class="input-field" id="postal_code" name="postal_code"
               type="text">
        <button class="button flash">Join Us</button>

      </div>

    </form>
  </div>

</div>


<?php
require __DIR__.'/../includes/footer.inc.php'; ?>
