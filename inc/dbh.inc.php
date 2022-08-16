<?php

$serverName = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "test";

$conn = mysqli_connect($serverName, $dBUsername, $dbPassword, $dBName);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
