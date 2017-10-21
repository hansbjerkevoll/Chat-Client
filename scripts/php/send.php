<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';

if(isset($_GET['message']) && !empty($_GET['message'])){
    $message = $_GET['message'];
    send_msg($message, $conn);
}

