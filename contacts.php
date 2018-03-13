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
        <div class="sort-container">
          <h2>Sort</h2>
            <div class="sort-options">
              <form class="sort-form" action="includes/sort.inc.php" method="post">
                <h3>Alphabetical order</h3>
                <input type="radio" name="sort" id="alphaAscending" value="alphaAscending" checked>
                <label for="alphaAscending">Ascending</label>
                <br>
                <input type="radio" name="sort" id="alphaDescending" value="alphaDescending">
                <label for="alphaDescending">Descending:</label>
                <h3>Order added</h3>
                <input type="radio" name="sort" id="orderAscending" value="orderAscending">
                <label for="orderAscending">Ascending</label>
                <br>
                <input type="radio" name="sort" id="orderDescending" value="orderDescending">
                <label for="orderDescending">Descending</label>
                <br>
                <button type="submit" name="submit">Sort</button>
              </form>
          </div>
        </div>
      </div>
      <div class="content">
        <?php
          include_once 'includes/contactsQuery.inc.php'
        ?>
        <i class="material-icons" style="font-size:48px">add_circle</i>
      </div>
    </div>
    <div class="enlarged-form-container hide">
      <div class="enlarged-form">
        <form class="contacts-form" action="includes/addContacts.inc.php" method="post">
          <span>Create Contact</span>
          <br>
          <?php
            include_once 'includes/addContactErr.inc.php';
          ?>
          <input type="text" name="name" placeholder="Name" value="">
          <input type="text" name="email" placeholder="E-mail" value="">
          <input type="text" name="phone" placeholder="Phone Number" value="">
          <input type="text" name="notes" placeholder="Notes" value="">
          <br>
          <span>Cancel</span>
          <button type="submit" name="submit">Submit</button>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="contacts.js"></script>
  </body>
</html>
