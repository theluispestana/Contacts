<?php

if (isset($_POST['submit'])) {
  include_once 'dbconnect.inc.php';

  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $success = true;
  $header = 'Location: ../?';

  //Check for empty fields
  if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
    $header .= 'sempty';
    $success = false;
  }

  //check if input characters are valid
  if (!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last) || !preg_match("/^[a-zA-z\_]*$/", $uid)) {
    $header .= '&invc';
    $success = false;
  }

  //check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $header .= '&inve';
    $success = false;
  }

  //creating prepared statement
  $sql = "SELECT * FROM users WHERE user_uid=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
  } else {
    //bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "s", $uid);
    //run parameters inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
  }
  $resultCheck = mysqli_stmt_num_rows($result);
  //Checking if user name is usertaken
  if ($resultCheck > 0) {
    $header .= '&tknu';
  }

  //Checking for successful login
  if (!$success) {
    header($header);
  }

}