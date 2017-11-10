<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

if(isset($_GET['message']) && !empty($_GET['message'] && isset($_GET['receiver']) && !empty($_GET['receiver']))){
    $receiver = $_GET['receiver'];
    $message = $_GET['message'];
    send_msg($receiver, $message, $conn);
}

