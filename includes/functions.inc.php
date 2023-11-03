<?php

function emptyInputSignup($username, $email, $pwd, $pwdrepeat){
    $result = false; //initialize to false
    if(empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    return $result;
}

function invalidUid($username){
    $result = false; //initialize to false
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    return $result;
}

function invalidEmail($email){
    $result = false; //initialize to false
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result = false; //initialize to false
    if($pwd !== $pwdrepeat){
        $result = true;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Account/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        mysqli_stmt_close($stmt); 
        return $row;
    } else {
        mysqli_stmt_close($stmt); 
        $result = false;
        return $result;
    }
}



function createUser($conn, $email, $username, $pwd){
    $sql = "INSERT INTO users(usersEmail, usersUid, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Account/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss",  $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);

    session_start();
    $_SESSION["useruid"] = $username;

    header("location: ../index.php"); //Where you want the user to be taken to after successfully signing up.
    mysqli_stmt_close($stmt);
    exit();
}

function emptyInputLogin($username, $pwd){
    $result = false; //initialize to false
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){

    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../Account/signin.php?error=wrongLogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../Account/signin.php?error=wrongPassword");
        exit();
    }

    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $username;
        header("location: ../index.php");
        exit();
    }
}


