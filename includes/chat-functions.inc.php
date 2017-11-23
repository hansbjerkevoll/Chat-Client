<?php

if(!isset($_SESSION)) {
    session_start();
}

function get_msg($chatPartner, $conn){

    $user = $_SESSION['Username'];
    $chatPartner = mysqli_real_escape_string($conn, $chatPartner);
    $messages = array();

    //If chatPartner is group => Fetch everything sent to group
    if($chatPartner == 'group'){
        $sql = "SELECT * FROM Chat WHERE Receiver = 'group'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            //Get time message was sent
            $timeSent = strtotime($row['TimeSent']);

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

            $message = $row['Message'];

            //Trimming message
            //$message = trim($message);

            //Converting to proper string
            $message = nl2br(htmlspecialchars($message));

<<<<<<< HEAD
=======
            //Checking if !image command is used to send image
            if(substr($message, 0, 7) == "!image "){
                $imgLink = substr($message, 7, strlen($message));
                $message = "<div style='width: 100%; margin-top: 10px;'> <img src = '" . $imgLink . "' style='max-width: 100%'></div>";
            }
            elseif (substr($message, 0, 5) == "!img "){
                $imgLink = substr($message, 5, strlen($message));
                $message = "<div style='width: 100%; margin-top: 10px;'> <img src = '" . $imgLink . "' style='max-width: 100%'></div>";
            }

            //Checking if message sent is a url
            if (filter_var($message, FILTER_VALIDATE_URL)) {
                $message = "<div><a href='$message' target='_blank'>$message</a> </div>";
            }

>>>>>>> origin/master
            $messages[] = array($row['Sender'], $displayTime, $message);
        }

        return $messages;
    }

    //If not => Get everyting sent from user to chatPartner or from chatPartner to user
    else{
        $sql = "SELECT * FROM Chat";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){

            if(($row['Sender'] == $user && $row['Receiver'] == $chatPartner) || ($row['Sender'] == $chatPartner && $row['Receiver'] == $user)){
                //Get time message was sent
                $timeSent = strtotime($row['TimeSent']);

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

                $message = $row['Message'];

                //Converting to proper string
                $message = nl2br(htmlspecialchars($message));

                //Checking if !image command is used to send image
                if(substr($message, 0, 7) == "!image "){
                    $imgLink = substr($message, 7, strlen($message));
                    $message = "<div style='width: 100%; margin-top: 10px;'> <img src = '" . $imgLink . "' style='max-width: 100%'></div>";
                }
                elseif (substr($message, 0, 5) == "!img "){
                    $imgLink = substr($message, 5, strlen($message));
                    $message = "<div style='width: 100%; margin-top: 10px;'> <img src = '" . $imgLink . "' style='max-width: 100%'></div>";
                }

                //Checking if message sent is a url
                if (filter_var($message, FILTER_VALIDATE_URL)) {
                    $message = "<div><a href='$message' target='_blank'>$message</a> </div>";
                }

                $messages[] = array($row['Sender'], $displayTime, $message);
            }
        }

        return $messages;
    }
}

function send_msg($receiver, $message, $conn){

    $sender = $_SESSION['Username'];
    $message = mysqli_real_escape_string($conn, $message);
    $receiver = mysqli_real_escape_string($conn, $receiver);

    if(!(empty($sender) || empty($message))){

        //Check if message is !img / !image command, and if image exists
        //Checking if !image command is used to send image
        if(substr($message, 0, 7) == "!image "){
            $imgLink = substr($message, 7, strlen($message));
            if(!checkRemoteFile($imgLink)){
                return false;
            }
        }
        elseif (substr($message, 0, 5) == "!img "){
            $imgLink = substr($message, 5, strlen($message));
            if(!checkRemoteFile($imgLink)){
                return false;
            }
        }

        //Get current time
        $currentDate = date('Y-m-d G-i-s',time());

        //Insert data into database
        $sql = "INSERT INTO Chat (Sender, Receiver, TimeSent, Message) VALUES ('$sender', '$receiver', '$currentDate' ,'$message')";

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

function checkRemoteFile($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}

