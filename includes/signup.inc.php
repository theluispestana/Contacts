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
    if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z\_]*$/", $uid)) {
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
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
   	exit;
    } else {
        echo "test1";
        //bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "s", $uid);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $resultCheck = $result->num_rows;
    echo $resultCheck;

    //Checking if user name is usertaken
    if ($resultCheck > 0) {
        $header .= '&tknu';
        $success = false;
    }

    //Checking for successful signup
    if (!$success) {
        echo "test3";
        header($header);
    } else {
        echo "test4";
        //hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //Adding info to database
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	    exit;
        } else {
            echo "test5";
            //bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $hashedPwd);
            //run parameters inside database
            mysqli_stmt_execute($stmt);
            header("Location: ../?success");
        }
    }
} else {
    header("Location: ../");
}
