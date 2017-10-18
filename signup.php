<?php
session_start();



?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat client</title>
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
    <div class = "page-wrapper">
        <form action = includes\signup.inc.php method="post">
            <p class = "header">Create an account</p>
            <input type = "text" name = "firstname" placeholder = "First Name" required>
            <input type = "text" name = "lastname" placeholder = "Last Name" required>
            <input type = "text" name = "username" placeholder = "Username" required>
            <input type = password name = "password" placeholder = "Password" required>
            <input type = password name = "passwordCheck" placeholder = "Retype password" required>
            <input type = "email"  name = "email" placeholder = "E-mail" required>
            <button type = "submit" name = "submit">Sign up</button>

        </form>

        Already registered? <a href = "index.php">Sign in</a>
    </div>
</div>




</body>
</html>