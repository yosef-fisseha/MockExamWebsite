<?php

require_once('connect/connection.php');

$newID = $_GET['department'];
$ID = $_GET['removeid'];
$selected_mtbl = $_GET['tbl_name'];
echo $selected_mtbl;
$sql = "DELETE FROM `$selected_mtbl` WHERE `ID`= $ID";
$result = mysqli_query($connect,$sql);

header("Location: edit_course_material.php?department=$newID");
?>