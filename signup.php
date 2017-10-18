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

<form action = includes\signup.inc.php method="post">

    First Name:
    <br><input type = "text" name = "firstname" required><br>
    Last Name:
    <br><input type = "text" name = "lastname" required><br>
    Username:
    <br><input type = "text" name = "username" required><br>
    Password:
    <br><input type = password name = "password" required><br>
    Retype password:
    <br><input type = password name = "passwordCheck" required><br>
    Email:
    <br><input type = "email"  name = "email" required><br>
    <br><button type = "submit" name = "submit">Sign up</button>

</form>

</body>
</html>