<?php

if(!isset($_SESSION)) {
    session_start();
}

//Checking if user has pressed sign-up button. If not => send to index.php
if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    //Getting input from the forms on signup page
    $profilepicsrc = mysqli_real_escape_string($conn, $_POST['profile-pic']);

    //Updating profile picture
    $userID = $_SESSION['UserID'];

    $sql = "UPDATE Users Set ProfilePic = '$profilepicsrc' WHERE UserID = '$userID'";

    if (!mysqli_query($conn, $sql)) {
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "ERROR: FAILED TO SAVE SETTINGS!"  . "\n" . mysqli_error($conn);
        header("Location: ../chat-main.php");
        exit();
    }
    else{
        header("Location: ../chat-main.php");
        exit();
    }
}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "ERROR";
    header("Location: ../index.php");
    exit();
}



