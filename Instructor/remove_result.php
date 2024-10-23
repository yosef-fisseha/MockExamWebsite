<?php

require("session.php");
require_once("connect/connection.php");

$ID = $_GET['resultID'];

$query = mysqli_query($connect,"DELETE FROM `result` WHERE `ID`= $ID");
header("Location: user_results.php");
?>
