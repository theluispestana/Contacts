<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <div class="header-main-container">
          <div class="header-name">
            <h2>Contacts test</h2>
          </div>
          <div class="header-links">
            <?php
              if (!isset($_SESSION['logged_in'])) {
                echo '<h2 class="">Sign In</h2>';
                echo '<h2 class="hide">Sign Up</h2>';
              } else {
                echo "<p>Signed in as: " . $_SESSION['user_uid'] . "</p>";
                echo "<form class=\"\" action=\"includes/signout.inc.php\" method=\"post\">";
                echo "<button type=\"submit\" name=\"submit\">Sign Out</button></form>";
              }
            ?>
          </div>
      </div>
    </header>
