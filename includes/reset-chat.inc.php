<?php

if(!isset($_SESSION)) {
    session_start();
}


if($_SESSION['Username'] == 'hansbj'){

    include 'database.inc.php';

    $sql = "TRUNCATE Chat";
    if(mysqli_query($conn, $sql)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Chat was successfully reset";
        header("Location: ../chat-main.php");
        exit();
    }
    else{
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Failed to reset chat...";
        header("Location: ../chat-main.php");
        exit();
    }
}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "You do not have permission to reset the chat!";
    header("Location: ../chat-main.php");
    exit();
}