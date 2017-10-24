<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

session_start();

$messages = get_msg($conn);

foreach ($messages as $message){
    if($_SESSION['Username'] == $message[0]){
        echo "<div class='message' style='position: relative;
              word-break: break-all;
              left: 48.6%;
              max-width: 50%; 
              border-radius: 10px;
              background-color: lightskyblue;
              padding: 5px;
              margin-top: 10px;
              margin-bottom: 10px;'>
              <label><b>" . $message[0] . " (" . $message[1] . ")" ."</b><br>" . $message[2] . "</label></div>";
    }
    else{
        echo "<div class='message' style='position: relative; 
              word-break: break-all;
              max-width: 50%; 
              border-radius: 10px;
              background-color: #d2d2d2;
              padding: 5px;
              margin-top: 10px;
              margin-bottom: 10px'>
              <b><i>" . $message[0] . " (" . $message[1] . ")" ."</i></b><br>" . $message[2] . "</div>";
    }

}
