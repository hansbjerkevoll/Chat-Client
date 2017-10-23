<?php

session_start();

function get_msg($conn){

    $sql = "SELECT * FROM Chat";
    $result = mysqli_query($conn, $sql);

    $messages = array();

    while($row = mysqli_fetch_assoc($result)){

        //Get time message was sent
        $timeSent = strtotime($row['TimeSent']);

        //Converting to proper string

        //Checking if text was sent last year
        if((strtotime(date('Y', time()))) > (strtotime(date('Y', $timeSent)))){
            $displayTime = date('jS M Y H:i', $timeSent);
        }
        //Checking if sent more than 24 hours ago
        elseif($timeSent < time() - (24*3600)){
            $displayTime = date('jS M H:i', $timeSent);
        }
        //If not display hour and minute
        else{
            $displayTime = date('H:i', $timeSent);
        }

        $messages[] = array($row['Sender'], $displayTime, $row['Message']);
    }

    return $messages;
}

function send_msg($message, $conn){

    $sender = $_SESSION['Username'];
    $message = mysqli_real_escape_string($conn, $message);

    if(!(empty($sender) || empty($message))){

        //Get current time
        $currentDate = date('Y-m-d G-i-s',time());

        //Insert data into database
        $sql = "INSERT INTO Chat (Sender, TimeSent, Message) VALUES ('$sender', '$currentDate' ,'$message')";

        if(mysqli_query($conn, $sql)){
            return True;
        }
        else{
            return False;
        }
    }
    else{
        return False;
    }
}
