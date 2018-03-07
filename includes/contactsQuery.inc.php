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
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    // var_dump($result);
    // var_dump($row[1]["unique_id"]);
    // echo $row[1]["unique_id"];
    foreach ($rows as $row) {
      echo $row["contact_name"] . " ";
      echo $row["contact_phone"] . " ";
      echo $row["contact_email"] . " ";
      echo $row["contact_notes"] . " ";
      echo "<br>";
    }
    // echo '<pre>'; print_r($rows);echo '<pre>';
}
