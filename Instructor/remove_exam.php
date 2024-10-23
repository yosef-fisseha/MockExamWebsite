<?php

require_once('connect/connection.php');

$ID = $_GET['removeid'];

$sql = "DELETE FROM `exam_category` WHERE `level_ID`= $ID";
$result = mysqli_query($connect,$sql);

header("Location: manage_exams.php");
?>