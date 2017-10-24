<?php

include '../../includes/database.inc.php';

$sql = "SELECT * FROM Chat";
$result = mysqli_query($conn, $sql);
$msgNum = mysqli_num_rows($result);


echo $msgNum;