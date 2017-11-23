<?php

<<<<<<< HEAD
session_start();
=======
if(!isset($_SESSION)) {
    session_start();
}
>>>>>>> origin/master
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
