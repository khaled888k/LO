<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "learning_curve";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
     mysqli_set_charset($conn,"utf8");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
