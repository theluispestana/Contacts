<?php

session_start();

if (isset($_SESSION['user_id'])) {
    include_once 'dbconnect.inc.php';
    $uid = $_GET['id'];

    //creating prepared statement
    $sql = "DELETE FROM contact_info WHERE unique_id=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        //bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "s", $uid);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        header("Location: ../contacts.php");
    }
}
