<?php

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['submit'])){

    include_once 'database.inc.php';

    $problemArea = mysqli_real_escape_string($conn, $_POST['problem-area']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);

    //Wrapping if lines are longer than 70 characters
    $problem = wordwrap($problem, 70);

    $subject = "Alpha chat - problem reported by " . $_SESSION['FirstName'] . " " . $_SESSION['LastName'];

    $content = "A problem has been reported on the chat client 'Alpha Chat'. \n\nThe following problem was reported:\nProblem-area: " . $problemArea ."\nProblem-message: \n\"" .$problem . "\"";

    //Sending mail
    mail("hansbjerkevoll@gmail.com", $subject, $content);

    header("Location: ../chat-main.php");
    exit();
}

header("Location: ../chat-main.php");
exit();
