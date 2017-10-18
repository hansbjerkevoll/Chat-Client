<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Client</title>
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

<?php

    echo "Name: " . $_SESSION['FirstName'] . " " . $_SESSION['LastName'] . "<br>";
    echo "Username: " . $_SESSION['Username'] . "<br>";
    echo "E-mail: " . $_SESSION['Email'] . "<br>";

?>


<form onsubmit = "return confirm('Do you want to log out?')" action = "includes\logout.inc.php" method = "post">
    <button type="submit" name="submit">Logout</button>
</form>

</body>
</html>