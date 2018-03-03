<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbconnect.inc.php';

    $uid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $phone = mysqli_real_escape_string($conn, $_SESSION['phone']);
    $notes = mysqli_real_escape_string($conn, $_SESSION['notes']);

    //Check for empty fields
    // if (empty($name) || empty($email) || empty($phone) || empty($notes)) {
    //
    // }

    //Check if input charcters are valid
    if (!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $notes) || !preg_match("/^[0-9()-]*$/", $phone)) {
      # code...
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      # code...
    }
}
