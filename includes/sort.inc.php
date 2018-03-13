<?php

session_start();

if (isset($_POST['submit'])) {
    include 'dbconnect.inc.php';
    // var_dump($_POST['sort']);

    if ($_POST['sort'] == "alphaAscending") {
        header("Location: ../contacts.php");
    } elseif ($_POST['sort'] == "alphaDescending") {
        header("Location: ../contacts.php?sort=ad");
    } elseif ($_POST['sort'] == "orderDescending") {
        header("Location: ../contacts.php?sort=dd");
    } elseif ($_POST['sort'] == "orderAscending") {
        header("Location: ../contacts.php?sort=da");
    }
} else {
    header("Location: ../contacts.php");
}
