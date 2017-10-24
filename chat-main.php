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
    <title>Chat Client</title>
    <link rel="icon" href="img/chat-icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class = "page-body">
    <div class="sidebar">

        <div class="sidebarHeader">
            <div class="logo">
                Chat Client (Alpha)
            </div>
        </div>

        <div class="userList">

            <div class="user" onclick='messageLogoChange(this)'>
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

                echo "<div class='user' onclick='messageLogoChange(this)'> <img class='user-icon' src= $imgLink ><div class='user-details'><span class='fullName'>" . $fullName . "</span> <i>(<span class='username'>"  .$userName . "</span>)</i></div></div>";
            }
            ?>
        </div>


    </div>

    <div class = "page-wrapper">
        <p id = "messageLogo">
            <span class='fullName'> Group Chat</span> <i hidden>(<span class='username'>group</span>)</i>
        </p>
        <div id = "messages"></div>

        <form action="#" method="post" id="message-form">
            <pre><textarea name = "message" placeholder="Type a message..." id = "message" required autofocus></textarea></pre>
            <button class="submitButton" type = "submit" name="submit">Send</button>
        </form>

    </div>

    <div class="logout">
        <form onsubmit = "return confirm('Do you want to log out?')" action = "includes/logout.inc.php" method = "post">
            <button id="logoutButton" type="submit" name="submit">
                <img id="logoutImg" src="img/logout.png">
            </button>
        </form>
    </div>


</div>


<!-- Script to change color to active element-->
<script>

    function messageLogoChange(item) {
        document.getElementById('messageLogo').innerHTML = item.getElementsByClassName('user-details')[0].innerHTML;
    }

    function hoverColor(item) {
        item.style.backgroundColor = 'lightgrey';
    }

    function resetColor(item) {
        item.style.backgroundColor = '#f9f9f9';
    }

    var divItems = document.getElementsByClassName("user");

    function selected(item){
        this.clear();
        item.style.backgroundColor = 'lightgrey';
    }

    function clear(){
        for(var i=0; i < divItems.length; i++){
            var item = divItems[i];
            item.style.backgroundColor = '#f9f9f9';
        }
    }
</script>

<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/auto-scroll.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

<!-- Script to send message when enter is clicked-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#message').keypress(function(e){
            if(e.which == 13 && !e.shiftKey){
                // submit via ajax or
                $('#message-form').submit();
            }
        });
    });
</script>

</body>
</html>