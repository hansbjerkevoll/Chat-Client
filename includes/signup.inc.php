<?php

session_start();

//Checking if user has pressed sign-up button. If not => send to index.php
if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    //Getting input from the forms on signup page
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordCheck = mysqli_real_escape_string($conn, $_POST['passwordCheck']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    //Checking for empty fields
    if(empty($username) || empty($password) || empty($passwordCheck) || empty($email)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Missing fields";
        header("Location: ../signup.php");
        exit();
    }

    //Checking if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "E-mail adress not valid!";
        header("Location: ../signup.php");
        exit();
    }

    //Checking if the two type password match
    if(!($password == $passwordCheck)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "The two passwords don't match";
        header("Location: ../signup.php");
        exit();
    }

    //Checking if username or email is taken
    $sql = "SELECT * FROM Users";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if($username == $row['Username']){
                $_SESSION['popup'] = True;
                $_SESSION['popup-message'] = "Username already taken";
                header("Location: ../signup.php");
                exit();
            }

            if($email == $row['Email']){
                $_SESSION['popup'] = True;
                $_SESSION['popup-message'] = "Email-adress already in use";
                header("Location: ../signup.php");
                exit();
            }
        }
    }

    //Hashing password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Inserting data into the database
    $sql = "INSERT INTO Users (FirstName, LastName, Username, Gender, Email, Password) VAlUES ('$firstname', '$lastname', '$username', '$gender', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {

        //Logging in the user, with data from database
        $sql = "SELECT * FROM Users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['FirstName'] = $row['FirstName'];
        $_SESSION['LastName'] = $row['LastName'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Email'] = $row['Email'];

        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "User successfully created!";
        header("Location: ../chat-main.php");
        exit();
    }
    else{
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "ERROR: FAILED TO CREATE NEW USER!"  . "\n" . mysqli_error($conn);
        header("Location: ../signup.php");
        exit();
    }
}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "ERROR";
    header("Location: ../index.php");
    exit();
}



