<?php
session_start();

if(isset($_POST['submit'])){
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($username,$email, $pwd, $pwdrepeat)){
        header("location: ../Account/signup.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username)){
        header("location: ../Account/signup.php?error=invaliduid");
        exit();
    }

    if(invalidEmail($email)){
        header("location: ../Account/signup.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd, $pwdrepeat)){
        header("location: ../Account/signup.php?error=Passwordsdon'tmatch");
        exit();
    }

    if(uidExists($conn, $username, $email)){
        header("location: ../Account/signup.php?error=UsernameExists");
        exit();
    }

    createUser($conn, $email, $username, $pwd);

} else {
    header("location: ../Account/signin.php");
    exit();
}