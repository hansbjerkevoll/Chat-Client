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
    <div class = "page-wrapper">
        <div id = "messages">


        </div>


        <form action="#" method="post" id="message-form">
            <input type = hidden name = "sender" id = "sender" value = <?php echo $_SESSION['Username']?>>
            <input type = text name = "message" placeholder="Type a message..." id = "message" required>
            <button type = submit name = "submit" id = "submit">Send</button>
        </form>

        <form onsubmit = "return confirm('Do you want to log out?')" action = "includes\logout.inc.php" method = "post">
            <button style="background-color: red" type="submit" name="submit">Logout</button>
        </form>
    </div>

</div>



<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

</body>
</html>