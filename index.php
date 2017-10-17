<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Front page</title>
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

<a href = "signup.php">Signup!</a>

</body>
</html>