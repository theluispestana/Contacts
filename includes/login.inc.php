<?php

if (isset($_POST['submit'])) {
  include 'dbconnect.inc.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $header = 'Location: ../?';

  if (empty($uid) || empty($pwd)) {
    $header .= 'sempty';
  }
}
