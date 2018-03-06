<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbconnect.inc.php';

    $uid = $_SESSION['user_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);

    //Check for empty fields
    if (empty($name) || empty($email) || empty($phone) || empty($notes)) {
        header("Location: ../contacts.php?empty");
    } else {
        //Check if input charcters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $notes) || !preg_match("/^[0-9()-]*$/", $phone)) {
            header("Location: ../contacts.php?invc");
        } else {
          //Check if Email is valid
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../contacts.php?invemail");
          } else {
            //Adding contact info to database
            $sql = "INSERT INTO contact_info (user_id, contact_name, contact_phone, contact_email, contact_notes) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed";
            } else {
              //bind parameters to the placeholder
              mysqli_stmt_bind_param($stmt, "sssss", $uid, $name, $phone, $email, $notes);
              //run parameters inside database
              mysqli_stmt_execute($stmt);
              header("Location: ../contacts.php?success");
            }
          }
        }
    }
}
