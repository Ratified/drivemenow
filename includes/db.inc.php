<?php

$serverName = "localhost";
$dbUserName = "root";
$dBPassword = "";
$dBName = "drivemenow";

$conn = mysqli_connect($serverName, $dbUserName, $dBPassword, $dBName);

if(!$conn){
    die("Connection Failed: " .mysqli_connect_error());
}
