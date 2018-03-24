<?php

$dbServername = 'localhost';
$dbUsername = 'onlineco_admin';
$dbPassword = 'Avoidingtheerror1324';
$dbName = 'onlineco_contacts';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//echo "test";
//header("Location: ../?success");
