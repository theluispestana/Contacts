<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbconnect.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Check if imputs are empty
    if (empty($uid) || empty($pwd)) {
        header("Location: ../?siempty");
    } else {
        //prepared statement for user id
        $sql = "SELECT * FROM users WHERE user_uid=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $uid);
            // run parametersr inside database
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }
        //checking if username exists in database
        $resultCheck = $result->num_rows;
        if ($resultCheck < 1) {
            header('Location: ../?logErr');
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                // de-hashing and testing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                  header("Location: ../?logErr");
                } elseif ($hashedPwdCheck == true) {
                    // log in the user
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_first'] = $row['user_first'];
                    $_SESSION['user_last'] = $row['user_last'];
                    $_SESSION['user_email'] = $row['user_email'];
                    $_SESSION['user_uid'] = $row['user_uid'];
                    header('Location: ../');
                }
            }
        }
    }
}
