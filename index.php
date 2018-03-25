<?php
  include_once 'header.php';
?>

    <div class="content-main-container">
      <div class="content-text-container">
          <h1>Contacts test</h1>
          <br>
          <p>Welcome to Online Contacts. Create an account and save names, phone numbers, and emails!</p>
      </div>
      <div class="form-container">
          <form class="sign up" action="includes/signup.inc.php" method="post">
            <h1>Sign Up</h1>
            <?php
              include_once 'includes/signupErr.inc.php';
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
              include_once 'includes/loginErr.inc.php';
            ?>
            <input type="text" name="uid" placeholder="Username" value="">
            <input type="password" name="pwd" placeholder="Password" value="">
            <button type="submit" name="submit" >Sign In</button>
          </form>
      </div>
    </div>
    <script type="text/javascript" src="contacts.js"></script>
  </body>
</html>
