<?php

if (isset($_SESSION['user_id'])) {
    include_once 'dbconnect.inc.php';

    $uid = $_SESSION['user_id'];

    //creating prepared statement
    $sql = "SELECT * FROM contact_info WHERE user_id=? ";

    //If statements will change order of database results
    if (!isset($_GET['sort'])) {
        $sql .= "ORDER BY contact_name ASC";
    } elseif ($_GET['sort'] == "ad") {
        $sql .= "ORDER BY contact_name DESC";
    } elseif ($_GET['sort'] == "dd") {
        $sql .= "ORDER BY unique_id DESC";
    } elseif ($_GET['sort'] == "da") {
        $sql .= "ORDER BY unique_id ASC";
    }

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

    foreach ($rows as $row) {
        echo "<tr>";
          echo "<td>";
            echo $row["contact_name"];
          echo "</td>";
          echo "<td>";
            echo $row["contact_phone"];
          echo "</td>";
          echo "<td>";
            echo $row["contact_email"];
          echo "</td>";
          echo "<td>";
            echo $row["contact_notes"];
          echo "</td>";
          echo "<td class=" . $row['unique_id'] . "\">";
            echo "<a href=\"includes/rowDelete.inc.php?id=" . $row['unique_id'] ."\">";
              echo "<i class=\"material-icons\">delete</i>";
            echo "</a>";
          echo "</td>";
        echo "</tr>";
        // echo "<br>";
    }
    // echo '<pre>'; print_r($rows);echo '<pre>';
}
