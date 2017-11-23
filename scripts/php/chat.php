<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['Username'])){
    header("Location: ../../../index.php");
    exit();
}

if(isset($_GET['chatPartner']) && !empty($_GET['chatPartner'])){

    $chatPartner = $_GET['chatPartner'];

    $messages = get_msg($chatPartner, $conn);

    $foundFirst = false;

    foreach ($messages as $message){

        $sender_username = $message[0];

        //Get full name of sender
        $sqlSender = "SELECT * FROM Users WHERE Username = '$sender_username'";
        $resultSender = mysqli_query($conn, $sqlSender);
        $rowSender = mysqli_fetch_assoc($resultSender);
        $sender_fullname = $rowSender['FirstName'] . " " . $rowSender['LastName'];

        if(!$foundFirst){
            if($_SESSION['Username'] == $message[0]){
                echo "<div class='message' style='position: relative;
              word-wrap: break-word;
              left: 48.6%;
              max-width: 50%; 
              border-radius: 10px;
              background-color: #a2bff4;
              padding: 5px;
              margin-bottom: 10px;'>
              <b>" . $sender_fullname . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
            }
            else{
                echo "<div class='message' style='position: relative; 
              word-wrap: break-word;
              max-width: 50%; 
              border-radius: 10px;
              background-color: #d2d2d2;
              padding: 5px;
              margin-bottom: 10px'>
              <b>" . $sender_fullname . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
            }

            $foundFirst = true;
        }
        else{
            if($_SESSION['Username'] == $message[0]){
                echo "<div class='message' style='position: relative;
              word-wrap: break-word;
              left: 48.6%;
              max-width: 50%; 
              border-radius: 10px;
              background-color: #a2bff4;
              padding: 5px;
              margin-top: 10px;
              margin-bottom: 10px;'>
              <b>" . $sender_fullname . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
            }
            else{
                echo "<div class='message' style='position: relative; 
              word-wrap: break-word;
              max-width: 50%; 
              border-radius: 10px;
              background-color: #d2d2d2;
              padding: 5px;
              margin-top: 10px;
              margin-bottom: 10px'>
              <b>" . $sender_fullname . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
            }
        }
    }
}


