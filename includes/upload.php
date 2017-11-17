<?php

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['submit'])){

    //Conncetion to database
    include 'database.inc.php';

    $target_dir = "user-uploads/";
    $target_file = $target_dir . basename($_FILES["img-file"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["img-file"]["tmp_name"]);
    if($check === false) {
        $_SESSION['popup'] = true;
        $_SESSION['popup-message'] = "ERROR: File is not an image....";
        header("Location: ../chat-main.php");
        exit();
    }

    // Check file size (500kb)
    if ($_FILES["img-file"]["size"] > 500000) {
        $_SESSION['popup'] = true;
        $_SESSION['popup-message'] = "ERROR: Uploaded file is too large (max 500kb)";
        header("Location: ../chat-main.php");
        exit();
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $_SESSION['popup'] = true;
        $_SESSION['popup-message'] = "ERROR: Only JPG, JPEG, PNG & GIF files are allowed";
        header("Location: ../chat-main.php");
        exit();
    }

    // Upload file
    $moved = move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);


    // Uploading file to the server
    if ($moved) {
        $_SESSION['popup'] = true;
        $_SESSION['popup-message'] = "Successful";
        header("Location: ../chat-main.php");
        exit();
    } else {
        $_SESSION['popup'] = true;
        $_SESSION['popup-message'] = "ERROR: Uploading the image failed.";
        header("Location: ../chat-main.php");
        exit();
    }
}


else{
    header("Location: ../chat-main.php");
    exit();
}


