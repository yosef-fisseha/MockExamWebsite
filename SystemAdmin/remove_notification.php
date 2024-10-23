<?php

require("session.php");
require_once("connect/connection.php");

$ID = $_GET['removeid'];

$query = mysqli_query($connect,"DELETE FROM `admin_notification` WHERE `ID`= $ID");

header("Location: notification.php");
?>
