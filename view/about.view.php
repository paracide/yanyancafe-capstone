<?php

require_once __DIR__ . '/../includes/config.php';

// view starts
require_once __DIR__ . '/../includes/header.inc.php';
?>

<!--us page-->
<div class="page us-page">
    <div id="about-us"><h2>About Us</h2></div>
    <div class="us-intro">
        <b>Welcome to Yanyan Cafe</b>
        <p>
            At Yanyan Cafe, we're all about cats, coffee, and creating a cozy
            space for you to unwind. Our cafe is
            home to a delightful crew of feline friends, each with its own unique
            charm.
        </p>
        <div class="button flash"><a href="#find-us"
                                     title="Yanyan Cafe - Find Us ">Find Us</a>
        </div>
    </div>
    <div class="us-img">
        <img id="us-img" class="border" src="images/aboutus/us.webp" width="500"
             height="375" alt="us">
    </div>
</div>

<!--find us page-->
<div class="page" id="find-us">
    <div class="find-us-wrapper">
        <div class="loc-card">
            <div class="loc-card-content loc-dt">
            </div>
            <div>
                <div>Downtown</div>
            </div>
        </div>
        <div id="find-us-title">
            <h2>Find Us</h2>
        </div>
        <div class="loc-card ">
            <div class="loc-card-content loc-polo ">
            </div>
            <div>
                <div>Polo Park</div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="text-align: center">Time</th>
                    <th style="text-align: center">Dining</th>
                    <th style="text-align: center">Cat Lounge</th>
                    <th style="text-align: center">Fan Club</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mon-Fri</td>
                    <td>9:00 AM - 8:00 PM</td>
                    <td>11:00 AM - 7:00 PM</td>
                    <td>8:00 PM - 10:00 PM</td>
                </tr>

                <tr>
                    <td>Sat</td>
                    <td>11:00 AM - 8:00 PM</td>
                    <td>11:00 AM - 7:00 PM</td>
                    <td>8:00 PM - 10:00 PM</td>
                </tr>
                <tr>
                    <td>Sun</td>
                    <td>11:00 AM - 6:00 PM</td>
                    <td>12:00 AM - 5:00 PM</td>
                    <td>6:00 PM - 8:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once __DIR__ . '/../includes/footer.inc.php'; ?>
