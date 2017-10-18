<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

if(isset($_GET['message']) && !empty($_GET['message'])){

    $sender = $_GET['sender'];
    $message = $_GET['message'];
    if(send_msg($sender, $message, $conn)){
        echo "Message sent";
    }
    else{
        echo $sender;
    }
}

