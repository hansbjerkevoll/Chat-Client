<?php

$dbServername = "mysql.stud.ntnu.no";
$dbUsername = "hansbj";
$dbPassword = "36r4bd";
$dbName = "hansbj_loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}