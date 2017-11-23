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
    <div class = "page-wrapper" style="height: auto; width: 30%; left: 0;">
        <form action = includes/signup.inc.php method="post">
            <p class = "indexLogo">Create an account</p>
<<<<<<< HEAD
            <input type = "text" name = "firstname" placeholder = "First Name" required>
            <input type = "text" name = "lastname" placeholder = "Last Name" required>
            <input type = "text" name = "username" placeholder = "Username" required>
            <input type = password name = "password" placeholder = "Password" required>
            <input type = password name = "passwordCheck" placeholder = "Retype password" required>
            <input type = "email"  name = "email" placeholder = "E-mail" required>
            <select name="gender" id="gender-select">
                <option disabled selected hidden>Gender:</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <button class="submitButton" type = "submit" name = "submit">Sign up</button>
=======
            <input type = "text" class="input" style="width: 49%; float: left; margin-right: 2%;" name = "firstname" placeholder = "First Name" required>
            <input type = "text" class="input" style="width: 49%; float: left" name = "lastname" placeholder = "Last Name" required>
            <input type = "text" class="input" style="width: 100%; float: left;" name = "username" placeholder = "Username" required>
            <input type = password class="input" name = "password" placeholder = "Password" required>
            <input type = password class="input" name = "passwordCheck" placeholder = "Retype password" required>
            <input type = "email"  class="input" style="margin-bottom: 15px" name = "email" placeholder = "E-mail" required>
            <input type="radio" value="Male" name="gender" title="male" required> <label style="font-size: 140%; font-family: Tohoma, serif;">Male</label>
            <input type="radio" value="Female" name="gender" title="male" required> <label style="font-size: 140%; font-family: Tohoma, serif;">Female</label>
            <br><label style="font-size: 140%; font-family: Tohoma, serif; height: 50px;">Profile picture: </label> <img src="img/male-usericon.png" name="profile-pic" id="signup-profile-pic">
            <button class="submitButton" type = "submit" style="margin-top: 15px" name = "submit">Sign up</button>
>>>>>>> origin/master

        </form>

        Already registered? <a class="index-link" href = "index.php">Sign in</a>
    </div>



    <div class="modal" id="profilepic_page">
        <div class="modal-content" id="profilepic_page-content">
            <div class="modal-content-header" id="profilepic_page-header">
                <span class="modal-content-header-text" id="profilepic_page-text"><b>Choose profile pic</b></span>
                <span class="close-modal-content" id="close-profilepic_page">&times;</span>
            </div>
            <div id="profile-pic-list">
                <img class="profile-pic" src="img/profile-pics/user-1.png">
                <img class="profile-pic" src="img/profile-pics/user-2.png">
                <img class="profile-pic" src="img/profile-pics/user-3.png">
                <img class="profile-pic" src="img/profile-pics/user-4.png">
                <img class="profile-pic" src="img/profile-pics/user-5.png">
                <img class="profile-pic" src="img/profile-pics/user-6.png">
                <img class="profile-pic" src="img/profile-pics/user-7.png">
                <img class="profile-pic" src="img/profile-pics/user-8.png">
                <img class="profile-pic" src="img/profile-pics/user-9.png">
                <img class="profile-pic" src="img/profile-pics/user-10.png">
                <img class="profile-pic" src="img/profile-pics/user-11.png">
                <img class="profile-pic" src="img/profile-pics/user-12.png">
                <img class="profile-pic" src="img/profile-pics/user-13.png">
                <img class="profile-pic" src="img/profile-pics/user-14.png">
                <img class="profile-pic" src="img/profile-pics/user-15.png">
                <img class="profile-pic" src="img/profile-pics/user-16.png">
                <img class="profile-pic" src="img/profile-pics/user-17.png">
                <img class="profile-pic" src="img/profile-pics/user-18.png">
                <img class="profile-pic" src="img/profile-pics/user-19.png">
                <img class="profile-pic" src="img/profile-pics/user-20.png">
                <img class="profile-pic" src="img/profile-pics/user-21.png">
                <img class="profile-pic" src="img/profile-pics/user-22.png">
            </div>
        </div>
    </div>

</div>





<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script>
    // Get the modal
    var profilepic_modal = document.getElementById('profilepic_page');
    // Get the button that opens the modal
    var profilepic_btn = document.getElementById("signup-profile-pic");
    // Get the <span> element that closes the modal
    var profilepic_span = document.getElementById("close-profilepic_page");


    // When the user clicks the button, open the modal
    profilepic_btn.onclick = function() {
        profilepic_modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    profilepic_span.onclick = function() {
        profilepic_modal.style.display = "none";
    };

    $('.profile-pic').click(function () {

        var imgsrc = this.src;
        $("#signup-profile-pic").attr("src",imgsrc);

        //Close the modal after choosing profile pic
        document.getElementById('profilepic_page').style.display = "none";

        return false;
    });
</script>

</body>
</html>