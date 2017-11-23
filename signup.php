<?php

if(!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat client</title>
    <link rel="icon" href="img/chat-icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/modal-content.css">

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
    <div class = "page-wrapper" style="height: auto; width: 500px; left: 0;">
        <form action = includes/signup.inc.php method="post">
            <p class = "indexLogo">Create an account</p>
            <input type = "text" class="input" style="width: 49%; float: left; margin-right: 2%;" name = "firstname" placeholder = "First Name" required>
            <input type = "text" class="input" style="width: 49%; float: left" name = "lastname" placeholder = "Last Name" required>
            <input type = "text" class="input" style="width: 100%; float: left;" name = "username" placeholder = "Username" required>
            <input type = password class="input" name = "password" placeholder = "Password" required>
            <input type = password class="input" name = "passwordCheck" placeholder = "Retype password" required>
            <input type = "email"  class="input" style="margin-bottom: 15px" name = "email" placeholder = "E-mail" required>
            <input type="radio" value="Male" name="gender" title="male" required> <label style="font-size: 140%; font-family: Tohoma, serif;">Male</label>
            <input type="radio" value="Female" name="gender" title="male" required> <label style="font-size: 140%; font-family: Tohoma, serif;">Female</label>
            <div style="font-size: 140%; font-family: Tohoma, serif; padding-top: 30px; padding-bottom: 15px">Profile picture: </div>
            <img style="position: absolute; left: 140px; bottom: 100px" src= "img/male-usericon.png" id="signup-profile-pic">
            <input type="hidden" id="hidden-profile-pic-input" name="profile-pic" value="http://folk.ntnu.no/hansbj/Chat-Client/img/male-usericon.png">
            <button class="submitButton" type = "submit" style="margin-top: 15px" name = "submit">Sign up</button>
        </form>

        Already registered? <a class="index-link" href = "index.php">Sign in</a>
    </div>

    <!--- PROFILE PICTURES! -->
    <?php include 'modal-content/profile-pic.php'?>

</body>
</html>