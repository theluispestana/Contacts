<?php

if (isset($_SESSION['user_id'])) {
    include_once 'dbconnect.inc.php';

    $uid = $_SESSION['user_id'];

    //creating prepared statement
    $sql = "SELECT * FROM contact_info WHERE user_id=?";
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

    while ($row = $result->fetch_row()) {
        // printf ("%s (%s)\n", $row[0], $row[1]);
        echo $row;
    }
    foreach($result->fetch_row() as $row) {
      echo $row;
    }
}
