<?php
  session_start();

  if (!isset($_SESSION['logged_in'])) {
    header("Location: /Contacts");
  }
?>

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
              echo "<p>Signed in as: " . $_SESSION['user_uid'] . "</p>";
            ?>
            <form class="" action="includes/signout.inc.php" method="post">
              <button type="submit" name="submit">Sign Out</button>
            </form>
          </div>
      </div>
    </header>
    <div class="content-container">
      <div class="side-bar">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum felis vitae suscipit efficitur. Duis ut metus non diam scelerisque aliquam. Aenean fermentum sem sed orci hendrerit, ut molestie magna blandit. Sed hendrerit feugiat mi, et hendrerit est. Donec vel tortor in tellus cursus posuere. Maecenas fermentum est urna, et condimentum lorem vestibulum vitae. Pellentesque eu aliquam nunc. Duis vel turpi</p>
      </div>
      </div>
      <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum felis vitae suscipit efficitur. Duis ut metus non diam scelerisque aliquam. Aenean fermentum sem sed orci hendrerit, ut molestie magna blandit. Sed hendrerit feugiat mi, et hendrerit est. Donec vel tortor in tellus cursus posuere. Maecenas fermentum est urna, et condimentum lorem vestibulum vitae. Pellentesque eu aliquam nunc. Duis vel turpi</p>
      </div>
      </div>
    </div>
    <script type="text/javascript" src="contacts.js"></script>
  </body>
</html>
