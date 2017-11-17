<?php

include '../../includes/database.inc.php';

if(!isset($_SESSION)) {
    session_start();
}


if(isset($_GET['chatPartner']) && !empty($_GET['chatPartner'])){

    $username = $_SESSION['Username'];
    $chatPartner = $_GET['chatPartner'];

    //Special case for group chat
    if($chatPartner == 'group'){
        //Checking number of messages sent from you to chatpartner
        $sql = "SELECT * FROM Chat WHERE (Receiver = '$chatPartner')";
        $result = mysqli_query($conn, $sql);
        $msgNum = mysqli_num_rows($result);

        echo $msgNum;
    }
    else{
        //Checking number of messages sent from you to chatpartner
        $sql = "SELECT * FROM Chat WHERE (Sender = '$username' AND Receiver = '$chatPartner')";
        $result = mysqli_query($conn, $sql);
        $msgNumSent = mysqli_num_rows($result);

        //Checking number of messages sent from chatpartner to you
        $sql = "SELECT * FROM Chat WHERE (Sender = '$chatPartner' AND Receiver = '$username')";
        $result = mysqli_query($conn, $sql);
        $msgNumReceived = mysqli_num_rows($result);

        $msgNum = $msgNumSent + $msgNumReceived;

        echo $msgNum;
    }
}

