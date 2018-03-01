<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbconnect.inc.php';

    $uid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $phone = mysqli_real_escape_string($conn, $_SESSION['phone']);
    $notes = mysqli_real_escape_string($conn, $_SESSION['notes']);

    if (empty($name) || empty($email) || empty($phone) || empty($notes)) {

    }
}
