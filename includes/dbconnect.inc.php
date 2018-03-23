<?php

$dbServername = 'localhost';
$dbUsername = 'onlin402_admin';
$dbPassword = 'Avoidingtheerror1324';
$dbName = 'onlin402_Contacts';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
echo "success";
