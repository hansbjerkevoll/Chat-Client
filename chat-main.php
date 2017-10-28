<?php
session_start();

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
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php
    //Scripts for runnning popup boxes
    if(isset($_SESSION['popup']) && $_SESSION['popup']){
        $_SESSION['popup'] = False;
        $message = $_SESSION['popup-message'];
        echo "<script> window.alert('$message')</script>";
    }
    ?>
</head>
<body>

<div class = "page-body">

    <!--- Sidebar-menu -->
    <div class="sidebar">

        <!--- Settings in the sidebar -->
        <div class="settings">
            <button id="settings-button">
                <img id="settings-img" src="img/settings.png">
            </button>
            <div id="settings-content">
                <a href="#">About</a>
                <a href="#">Settings</a>
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
        <div class="userList">

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

                if($row['Gender'] == "Male"){
                    $imgLink = 'img/male-usericon.png';
                }
                else{
                    $imgLink = 'img/female-usericon.png';
                }

                echo "<div class='user' 
                        onclick='messageLogoChange(this), highlight(this)'> 
                        <img class='user-icon' src= $imgLink >
                        <div class='user-details'><span class='fullName'>" . $fullName . "</span> <i>(<span class='username'>"  .$userName . "</span>)</i></div>
                      </div>";
            }
            ?>
        </div>
    </div>

    <!--- Main chat page -->
    <div class = "page-wrapper">
        <p id = "messageLogo">
            <span class='fullName'> Group Chat</span> <i hidden>(<span class='username'>group</span>)</i>
        </p>
        <div id = "messages"></div>

        <div>
            <form action="#" method="post" id="message-form">
                <textarea name = "message" placeholder="Type a message..." id = "message" required autofocus></textarea>
                <button id="sendButton" type = "submit" name="submit">
                    <img id="sendImg" src="img/send-icon.png">
                </button>
            </form>
        </div>

    </div>


    <!--- REPORT PROBLEM FORM! -->
    <div id="report_problem">
        <div id="report_problem-content">
            <div id="report_problem-header">
                <span id="report_problem-header-text"><b>Report a problem</b></span>
                <span id="close-report_problem">&times;</span>
            </div>
            <form action="includes/report-problem-mail.inc.php" method="post" onsubmit="return confirm('Are you sure you want to report the problem?')" id="report_problem-form">
                <p>Where is the problem?</p>
                <select id="report_problem-select" name="problem-area">
                    <option>Messages or Chat</option>
                    <option>Login</option>
                    <option>Signup</option>
                    <option>Settings</option>
                    <option>Problem reporting</option>
                    <option>Other... (please specify)</option>
                </select>
                <p>What happened?</p>
                <textarea name="problem" id="problem" placeholder="Explain shortly (140 characters) what happened, and how to recreate the problem..." maxlength="140" required></textarea>
                <div id="report_problem-button">
                    <button id="report_problem-cancel" type="button">Cancel</button>
                    <button id="report_problem-send" type="submit" name="submit">Report problem</button>
                </div>
            </form>
        </div>
    </div>

</div>



<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

<!--- Script to handle report problem --->
<script type="text/javascript">

    // Get the modal
    var modal = document.getElementById('report_problem');
    // Get the button that opens the modal
    var btn = document.getElementById("report_problem-link");
    // Get the <span> element that closes the modal
    var span = document.getElementById("close-report_problem");
    //Cancel button
    var cancel = document.getElementById("report_problem-cancel");

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };
    cancel.onclick = function() {
        modal.style.display = "none";
    };

</script>


<script type="text/javascript">

    //Highlight the clicked user
    function highlight(item){
        var classList = document.getElementsByClassName('highlight');
        for(i = 0; i < classList.length; i++){
            classList[i].classList.remove('highlight');
        }
        item.classList.add('highlight');
    }

    /*
    //Toggle settings-menu
    $(document).ready(function() {
        $('#settings-button').click(function() {
            $('#settings-content').slideToggle("medium");
        });
    });
    */

    $(document).click(function(event) {
        if(event.target.id === "settings-img") {
            $('#settings-content').slideToggle("medium");
        }
        else{
            if($('#settings-content').is(":visible")) {
                $('#settings-content').slideToggle("medium");
            }
        }
    });

    // Script to change color to active element
    function messageLogoChange(item) {
        document.getElementById('messageLogo').innerHTML = item.getElementsByClassName('user-details')[0].innerHTML;
    }

    //Script to send message when enter is clicked
    $(document).ready(function(){
        $('#message').keypress(function(e){
            if(e.which === 13 && !e.shiftKey){
                // submit via ajax or
                $('#message-form').submit();
            }
        });
    });
</script>

</body>
</html>