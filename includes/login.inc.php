<?php

if(!isset($_SESSION)) {
    session_start();
}

//Checking if user has pressed sign-up button. If not => send to index.php
if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    //Getting login input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Saving username to put in login form if login fails
    $_SESSION['username_input'] = $username;

    //Checking if input is empty
    if(empty($username) || empty($password)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Missing fields";
        header("Location: ../index.php");
        exit();
    }

    //Checking if typed in username/email exists
    $sql = "SELECT * FROM Users";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $validUsername = False;
        while($row = mysqli_fetch_assoc($result)){
            //If username or email match => verify the password and log in
            if($username == $row['Username'] || $username == $row['Email']){
                //Setting validUsername to true
                $validUsername = True;

                //Verifying the password
                if(!password_verify($password, $row['Password'])){
                    $_SESSION['popup'] = True;
                    $_SESSION['popup-message'] = "Wrong username and/or password";
                    header("Location: ../index.php");
                    exit();
                }

                //Deleting the input username
                unset($_SESSION['username_input']);

                //Logging in the user
                $_SESSION['UserID'] = $row['UserID'];
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['Email'] = $row['Email'];

                //Sending user to main page
                header("Location: ../chat-main.php");
                exit();
            }
        }
        if(!$validUsername){
            $_SESSION['popup'] = True;
            $_SESSION['popup-message'] = "Wrong username and/or password";
            header("Location: ../index.php");
            exit();
        }
    }
    else{
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Wrong username and/or password";
        header("Location: ../index.php");
        exit();
    }

}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "ERROR";
    header("Location: ../index.php");
    exit();
}



