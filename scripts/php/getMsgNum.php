<?php

include '../../includes/database.inc.php';

session_start();


if(isset($_GET['chatPartner']) && !empty($_GET['chatPartner'])){

    $username = $_SESSION['Username'];
    $chatPartner = $_GET['chatPartner'];

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

