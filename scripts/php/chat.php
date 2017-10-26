<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

session_start();

if(isset($_GET['chatPartner']) && !empty($_GET['chatPartner'])){

    $chatPartner = $_GET['chatPartner'];

    $messages = get_msg($chatPartner, $conn);

    foreach ($messages as $message){
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
              <b>" . $message[0] . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
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
              <b>" . $message[0] . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</div>";
        }

    }
}


