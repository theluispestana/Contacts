<?php
  include_once 'header.php';
?>

    <div class="content-main-container">
      <div class="content-text-container">
          <h1>Contacts test</h1>
          <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum felis vitae suscipit efficitur. Duis ut metus non diam scelerisque aliquam. Aenean fermentum sem sed orci hendrerit, ut molestie magna blandit. Sed hendrerit feugiat mi, et hendrerit est. Donec vel tortor in tellus cursus posuere. Maecenas fermentum est urna, et condimentum lorem vestibulum vitae. Pellentesque eu aliquam nunc. Duis vel turpi</p>
      </div>
      <div class="form-container">
          <form class="sign up" action="includes/signup.inc.php" method="post">
            <h1>Sign Up</h1>
            <?php
              include_once 'includes/formError.inc.php';
            ?>
            <input type="text" name="first" placeholder="First Name" value="">
            <input type="text" name="last" placeholder="Last Name " value="">
            <input type="text" name="email" placeholder="E-mail" value="">
            <input type="text" name="uid" placeholder="Username" value="">
            <input type="password" name="pwd" placeholder="Password "value="">
            <button type="submit" name="submit">Sign Up</button>
          </form>
          <form class="sign in hide" action="includes/login.inc.php" method="post">
            <h1>Sign In</h1>
            <?php
              include_once 'includes/formError.inc.php';
            ?>
            <input type="text" name="uid" placeholder="Username" value="">
            <input type="password" name="pwd" placeholder="Password" value="">
            <button type="submit" name="submit">Sign In</button>
          </form>
      </div>
    </div>
    <script type="text/javascript" src="contacts.js"></script>
  </body>
</html>
