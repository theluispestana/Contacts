<?php

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '123456';
$dbName = 'Contacts';

try {
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
} catch (Exception $e) {
  echo "Message: ".$e->getMessage();
}
