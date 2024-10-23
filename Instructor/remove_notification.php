<?php

require("session.php");
require_once("connect/connection.php");

$ID = $_GET['removeid'];

$query = mysqli_query($connect,"DELETE FROM `instructor_notification` WHERE `ID`= $ID");

header("Location: manage_notifications.php");
?>
