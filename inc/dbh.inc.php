<?php

$serverName = "localhost";
$dBUsername = "uobeleyhxcau8";
$dbPassword = "trashcan123";
$dBName = "dbwataur0ygaz5";

$conn = mysqli_connect($serverName, $dBUsername, $dbPassword, $dBName);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
