<?php

include '../../includes/database.inc.php';
include '../../includes/chat-functions.inc.php';


$messages = get_msg($conn);

foreach ($messages as $message){
    echo "<label class='message-label'><b>" . $message[0] .  ":</b></label>" . $message[1] . "<br>";
}
