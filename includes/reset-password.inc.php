<?php

if(!isset($_SESSION)) {
    session_start();
}

//Checking if user has pressed reset-password button. If not => send to index.php
if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    //Getting email from form
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    //Checking if empty
    if(empty($email)){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "Missing e-mail";
        header("Location: ../index.php");
        exit();
    }

    //Checking if email is in database
    $sql = "SELECT * FROM Users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        $_SESSION['popup'] = True;
        $_SESSION['popup-message'] = "E-mail not found";
        header("Location: ../index.php");
        exit();
    }
    //Get user details
    else{
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['FirstName'] . " " . $row['LastName'];
        $username = $row['Username'];
    }

    //Get newpassword
    $newpassword = generateRandomString(8);


    //Send email to user to reset password

    $subject = "Alpha Chat - Reset password";

    $message = "
    <html>
    <head>
    <title>Alpha Chat - Reset password</title>
    <style>
        body {
            font-family: Tahoma, \"Times New Roman\", serif; 
            font-size: 140%;
        }
        
        p {
            margin: 10px;
        }
        button {
            margin: 10px;
        }
    </style>
    <script>
        function showNewPassword() {
            alert('asdasdæ');
            document.getElementById('new-password').style.display = 'block';
        }
    </script>
    </head>
    <body>
    <p>If you did not expect to receive this email, please ignore and carry on with your life.</p>
    <br>
    <p><b>User details:</b></p>
    <p>
    Full name: ".$fullname."<br>
    Username: ".$username."
    </p>
    <p>Click the button below to change your password to a randomly generated string</p>
    <button onclick='showNewPassword()'>Reset password</button>
    <br>
    <p id='new-password' style='display: none'>Your new password: <b>".$newpassword."</b></p>
    
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


    mail($email,$subject,$message,$headers);

    //Return to index.php
    header("Location: ../index.php");
    exit();



}
else{
    $_SESSION['popup'] = True;
    $_SESSION['popup-message'] = "ERROR";
    header("Location: ../index.php");
    exit();
}


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



