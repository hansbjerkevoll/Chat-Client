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

                echo "<div class='user'> <img class='user-icon' src= $imgLink ><div class='user-details'>" . $fullName . " <i>("  .$userName . ")</i></div></div>";
            }
            ?>
        </div>


    </div>

    <div class = "page-wrapper">

        <div id = "messages"></div>

        <form action="#" method="post" id="message-form">
            <pre><textarea name = "message" placeholder="Type a message..." id = "message" required></textarea></pre>
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




<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

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