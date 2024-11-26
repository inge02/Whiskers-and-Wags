<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "whiskers_and_wags";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn){
    die("Something went wrong. Cannot connect to database");
}

?>