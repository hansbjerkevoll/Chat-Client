<?php

session_start();

//Checking if user has pressed sign-up button. If not => send to index.php
if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    //Getting input from the forms on signup page
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordCheck = mysqli_real_escape_string($conn, $_POST['passwordCheck']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //Checking for empty fields
    if(empty($username) || empty($password) || empty($passwordCheck) || empty($email)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Missing fields";
        header("Location: ..\signup.php");
        exit();
    }



    //Checking if the two type password match
    if(!($password == $passwordCheck)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "The two passwords don't match";
        header("Location: ..\signup.php");
        exit();
    }



    //Checking if username or email is taken
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($username == $row['username']){
                $_SESSION['popup'] = True;
                $_SESSION['popup-message'] = "Username already taken";
                header("Location: ..\signup.php");
                exit();
            }

            if($email == $row['email']){
                $_SESSION['popup'] = True;
                $_SESSION['popup-message'] = "Email-adress already in use";
                header("Location: ..\signup.php");
                exit();
            }
        }
    }

    //Hashing password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Inserting data into the database

    $sql = "INSERT INTO users (username, password, email) VAlUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "User successfully created!";
        header("Location: ..\signup.php");
        exit();
    }
    else{
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "ERROR: FAILED TO CREATE NEW USER!"  . "\n" . mysqli_error($conn);
        header("Location: ..\signup.php");
        exit();
    }
}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "ERROR";
    header("Location: ..\index.php");
    exit();
}



