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
    <title>Contacts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

      </div>
      <div class="content">
        <i class="material-icons" style="font-size:48px">add_circle</i>
      </div>
    </div>
    <div class="enlarged-form-container hide">
      <div class="enlarged-form">
        <form class="contacts-form" action="includes/addContacts.inc.php" method="post">
          <span>Create Contact</span>
          <br>
          <input type="text" name="name" placeholder="Name" value="">
          <input type="text" name="email" placeholder="E-mail" value="">
          <input type="text" name="phone" placeholder="Phone Number" value="">
          <input type="text" name="notes" placeholder="Notes" value="">
          <br>
          <span>Cancel</span>
          <button type="button" name="submit">Submit</button>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="contacts.js"></script>
  </body>
</html>
