<?php


function get_msg($conn){

    $sql = "SELECT * FROM Chat";
    $result = mysqli_query($conn, $sql);

    $messages = array();

    while($row = mysqli_fetch_assoc($result)){
        $messages[] = array($row['Sender'], $row['Message']);
    }

    return $messages;
}

function send_msg($sender, $message, $conn){

    $sender = mysqli_real_escape_string($conn, $sender);
    $message = mysqli_real_escape_string($conn, $message);

    if(!(empty($sender) || empty($message))){

        //Insert data into database
        $sql = "INSERT INTO Chat (Sender, Message) VALUES ('$sender', '$message')";

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
