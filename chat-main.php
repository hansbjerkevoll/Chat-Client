<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['Username'])){
    header("Location: index.php");
    exit();
}

include 'includes/database.inc.php';
include 'includes/chat-functions.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Alpha Chat v0.8</title>
    <link rel="icon" href="img/chat-icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/modal-content.css">

    <!--- META DATA -->
    <meta charset="UTF-8">
    <meta name="author" content="Hans Bjerkevoll">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    //Scripts for runnning popup boxes
    if(isset($_SESSION['popup']) && $_SESSION['popup']){
        $_SESSION['popup'] = False;
        $message = $_SESSION['popup-message'];
        echo "<script> window.alert('$message');</script>";
    }
    ?>
</head>
<body>

<div class = "page-body">

    <!--- Sidebar-menu -->
    <div class="sidebar">

        <!--- Settings in the sidebar -->
        <div class="settings">
            <button id="settings-button" title="Settings">
                <img id="settings-img" src="img/settings.png">
            </button>
            <div id="settings-content">
                <a href="#" id="about-link">About</a>
                <a href="#" id="modal-settings-link">Settings</a>
                <a href="#" id="report_problem-link">Report a problem</a>
                <a href="includes/reset-chat.inc.php" onclick="return confirm('Are you sure you want to reset the chat?\nNOTE: This will delete all sent messages')">Reset Chat</a>
                <a href="includes/logout.inc.php" id="logout" onclick = "return confirm('Are you sure you want to log out...?')">Logout</a>
            </div>
        </div>

        <div class="sidebarHeader">
            <div class="logo">
                Alpha Chat v0.8
            </div>
        </div>

        <!--- List of the users -->
        <div class="userList scrollbar">


            <div class="user highlight" onclick='messageLogoChange(this), highlight(this)'>
                <img class='user-icon' src= 'img/group-usericon.png'>
                <div class='user-details'>
                    <b><span class='fullName'>Group Chat</span> <i hidden>(<span class='username'>group</span>)</i></b>
                </div>
            </div>

            <?php

            //Looping through all users and displaying them in the sidebar

            $sql = "SELECT * FROM Users";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

                $fullName = $row['FirstName'] . " " . $row['LastName'];
                $userName = $row['Username'];
                $email = $row['Email'];
                $imgLink = $row['ProfilePic'];

                if($imgLink == null){
                    if($row['Gender'] == "Male"){
                        $imgLink = 'img/male-usericon.png';
                    }
                    else{
                        $imgLink = 'img/female-usericon.png';
                    }
                }

                echo "<div class='user' onclick='messageLogoChange(this), highlight(this)'> 
                        <img class='user-icon' src= $imgLink >
                        <div class='user-details'><span class='fullName'>" . $fullName . "</span> <i hidden>(<span class='username'>"  .$userName . "</span>)</i></div>
                      </div>";
            }
            ?>
        </div>

    </div>

    <!--- MAIN CHAT PAGE -->
    <div class = "page-wrapper">
        <p id = "messageLogo">
            <span class='fullName'> Group Chat</span> <i hidden>(<span class='username'>group</span>)</i>
        </p>
        <div>
            <button id="chat-options-button">
                <img id="chat-options-img" src="img/chat-options.png">
            </button>
            <div id="chat-options-content">
                <a href="#" id="sendEmoji-link">Send emoji</a>
                <a href="#" id="sendImg-link">Send image</a>
                <a href="#">Report user</a>
            </div>
        </div>

        <div id = "messages" class="scrollbar"></div>

        <div id="message-input">
            <form action="#" method="post" id="message-form">
                <textarea name = "message" placeholder="Type a message..." id = "message" required autofocus></textarea>
                <img id="sendEmoji-image" src="img/send-emoji.png" title="Send emoji">
                <img id="sendImg-image" src="img/image-icon.png" title="Send image">
                <button id="sendMessage-Button" type="submit" title="Send message">
                    <img class="messageIcon" id="sendIcon" src="img/send-icon.png">
                </button>
            </form>
        </div>
    </div>

    <!--- ABOUT -->
    <?php include 'modal-content/about.php'?>

    <!--- REPORT PROBLEM FORM! -->
    <?php include 'modal-content/report-problem.php'?>

    <!--- SEND IMAGE -->
    <?php include 'modal-content/send-image.php'?>

    <!--- SEND EMOJI -->
    <?php include 'modal-content/send-emoji.php'?>

    <!--- SETTINGS -->
    <?php include 'modal-content/settings.php'?>





</div>

<!--- JQuery Functions -->
<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

<!-- Various functions -->
<script type="text/javascript" src="scripts/js/functions.js"></script>

<!--- Send Emoji -->
<script type="text/javascript" src="scripts/js/send-emoji.js"></script>

</body>
</html>