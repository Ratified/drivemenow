<?php
session_start(); // Add session_start at the beginning

if(isset($_POST["signin"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../Account/signin.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header("location: ../Account/signin.php");
    exit();
}
?>
