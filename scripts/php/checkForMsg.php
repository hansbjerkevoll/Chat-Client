<?php

session_start();

if($_SESSION['newmsg']){
    echo "True";
}
else{
    echo "False";
}