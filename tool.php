<?php

function index_top_module($pageTitle) {
$html = <<<"OUTPUT"
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$pageTitle</title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link rel="stylesheet" href="./css/style.css">
    <script src='../wireframe.js'></script>
  </head>
  <body>
    <div class="frontpage">
      <header>
        <div class="global-container">
          <div class="brand">
            <h1><a href="./index.php">GG.WP</a></h1>
          </div>
          <nav>
            <ul>
              <li><a href="./index.php"><span class="current">Home</span></a></li>
              <li><a href="./champList.php">Champion List</a></li>
              <li><a href="./login.php">Log In</a></li>
              <li><a href="./register.php" class="darken" >Register</a></li>
              <li><a href="./commentBook.php" class="darken" >Comment Book</a></li>
            </ul>
          </nav>
        </div>
      </header>
    </div>
    <main>
OUTPUT;
  echo $html;
}

function top_module($pageTitle) {
$html = <<<"OUTPUT"
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width'>
    <title>$pageTitle</title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="css/style.css">
    <script src='../wireframe.js'></script>
    <script src='./service-support.js'></script>
  </head>
  <body>
    <header>
      <div class="global-container">
        <div class="brand">
          <h1><a href="./index.php" class="brandname">Madrid Electrics</a></h1>
        </div>
        <nav>
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="">Gallery</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="./login.php" class="darken" >Log In</a></li>
            <li><a href="./cart.php" class="darken" >Cart</a></li>
            <li><a href="./checkout.php" class="darken" >Checkout</a></li>
          </ul>
        </nav>
      </div>
    </header>
  <main>
OUTPUT;
  echo $html;
}

function end_module() {
  echo '</div>

  <script src="js/jQuery.js"></script>
  <script src="js/app.js"></script>
  
  </body>
  </html>';
}

function services_module() {
$html = <<<"OUTPUT"
<section id="all-services">
  <div class="global-container">
  <a href="?id=E1" class="blackhyperlink"><h2>Electrical</h2>
    <div class="two-row">
      <div class="image-text-container">
        <img src="./media/powerpoint.jpeg" alt="Powerpoint Installation" />
        <!-- Image from: http://www.smartliving.com.au/media/catalog/product/cache/1/image/bc0328b31da627a51feee80ba06f2230/s/o/sockitz_silver_1.gif -->
          <div class="overlay">
            <div class="description">
              <p>Choice of powerpoints from standard, colored, single/multiple, indoor/outdoor and with fast charging USB port. </p>
            </div>
            <div class="overlay-heading">
              <h3>Powerpoint Installation</h3>
            </div>
          </div>
      </div>
      <div class="image-text-container">
        <img src="../electrical2.jpg" alt="Electrical Panel" />
        <!-- Image from: https://mistersparkyelectricsc.com/blog/electrical-issues-solutions-electrical-repair-charleston-sc/ -->
          <div class="overlay">
            <div class="description">
              <p>Upgrade or maintenance of electrical panels for both household and industrial area.</p>
            </div>
            <div class="overlay-heading">
              <h3>Electrical Panel</h3>
            </div>
          </div>
      </div>
    </div>
    </a>
    <a href="?id=L1" class="blackhyperlink"><h2>Lighting</h2>
    <div class="three-row">
      <div class="image-text-container">
        <img src="../media/downlight.jpg" alt="Downlights" />
        <!-- Image frmo: https://www.wink.com/products/commercial-electric-smart-led-downlight/ -->
          <div class="overlay">
            <div class="description">
              <p>Different shapes, sizes and colors of downlights to choose from to be installed.</p>
            </div>
            <div class="overlay-heading">
              <h3>Downlights</h3>
            </div>
          </div>
      </div>
      <div class="image-text-container">
        <img src="../media/light3.png" alt="Feature Lights" />
        <!-- Image from: http://pretamarcher.co/modern-hallway-lighting/modern-hallway-lighting-modern-hallway-lighting-modern-hallway-lighting-image-of-excellent-hallway-ceiling-lighting-ideas-using-unique-pendant/ -->
          <div class="overlay">
            <div class="description">
              <p>Various types of feature/pendant lights for aesthetics and the mood of your home or office.</p>
            </div>
            <div class="overlay-heading">
              <h3>Pendant Light</h3>
            </div>
          </div>
      </div>
      <div class="image-text-container">
        <img src="../media/chandelier.jpeg" alt="Chandelier" />
        <!-- Image from: https://www.brizzo.ca/chateaux-modern-foyer-crystal-chandelier-mirror-stainless-steel-base-12-lights -->
          <div class="overlay">
            <div class="description">
              <p>Grande looking glassy ornaments accompanied by lights for 2-storey houses or mansions.</p>
            </div>
            <div class="overlay-heading">
              <h3>Chandelier</h3>
            </div>
          </div>
      </div>
    </div>
    </a>
    <a href="?id=S1" class="blackhyperlink"><h2>Security</h2>
    <div class="two-row">
      <div class="image-text-container">
        <img src="../media/camera.jpg" alt="Security Camera" height="200" />
        <!-- Image from: https://bestbrothersgroup.b-cdn.net/wp-content/uploads/2018/03/surveillance-camera-mounted-on-concrete-wall.jpg -->
          <div class="overlay">
            <div class="description">
              <p>Up to 9 cameras per system to be installed in your home or office. Viewable online.</p>
            </div>
            <div class="overlay-heading">
              <h3>Security Camera</h3>
            </div>
          </div>
      </div>
      <div class="image-text-container">
        <img src="../media/securityalarm.jpg" alt="Security Alarm" height="200" />
        <!-- Image from: http://lintsecurity.com/blog/alarmed-security-systems -->
          <div class="overlay">
            <div class="description">
              <p>Security Alarm to alert you when somebody breaks in your secured home or office.</p>
            </div>
            <div class="overlay-heading">
              <h3>Security Alarm</h3>
            </div>
          </div>
      </div>
    </div>
    </a>
  </div>
</section>
OUTPUT;
  return $html;
}


?>
