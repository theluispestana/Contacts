<?php

// if(isset($_GET['sempty'])){
//   echo '<span>Fill in every field</span>';
// }

if (isset($_POST['submit'])) {
  include_once 'dbconnect.inc.php';

  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  //Check for empty fields
  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
  echo '<span>Fill out all forms</span>';
  }

  //check if input characters are valid
  if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last) || !preg_match("/^[a-zA-z\_]*$/", $uid)) {
    echo '<span>Invalid characters</span>';
  }

  //check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span>Invalid E-mail</span>";
  }
}
