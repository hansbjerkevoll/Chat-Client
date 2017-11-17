<?php

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['Username'])){
    header("Location: chat-main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat Client</title>
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
    <div class = "page-wrapper" style="height: auto; width: 50%; left: 0;">
        <form action = "includes/login.inc.php" method = "post">
            <p class = "indexLogo">Alpha Chat v0.8</p>
            <input type = "text" class="input" name = "username" placeholder = "Username / E-mail" autocomplete="off" required <?php if(isset($_SESSION['username_input'])) echo "value = " . $_SESSION['username_input'] ; else echo "autofocus"?>><br>
            <input type = "password" class="input" name = "password" placeholder = "Password" autocomplete="off" required <?php if(isset($_SESSION['username_input'])) echo "autofocus";?>><br>
            <button class="submitButton" type = "submit" name = "submit">Login</button>
        </form>

        <span id="registered-link">Not registered? <a href = "signup.php" class="index-link">Create an account</a></span>
        <span id="password-link">Forgot your password? <a href = # class="index-link">Click here to reset</a></span>
        <br><p style="margin-bottom: 0; color: red"><b>NOTE: This should not be used by anyone ever, for any reason. It is utterly garbage</b></p>
    </div>
</div>

<footer id="index-footer">
    <img id="footer-logo" src="img/chat-icon.png">
    <div id="info">
        <ul id="info-list">
            <li class="info-list-items"><b>Made by: </b>Hans Bjerkevoll (Oct 2017)</li>
            <li class="info-list-items"><b>Contact: </b> <a href="mailto:hansbjerkevoll@gmail.com" class="info-link" target="_blank">hansbjerkevoll@gmail.com</a></li>
            <li class="info-list-items"><b>Git-Hub Repository: </b><a href="https://github.com/hansbjerkevoll/chat-client" target="_blank" class="info-link">https://github.com/hansbjerkevoll/chat-client</a></li>
        </ul>
    </div>
    <div id="copyright-footer">
        <span id="copyright-text">Copyright &#9400; 2017 Hans Bjerkevoll</span><br>
        <span>All rights reserved</span>
    </div>

</footer>

</body>
</html>