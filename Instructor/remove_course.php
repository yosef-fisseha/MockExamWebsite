<?php
require_once("connect/connection.php");

$courseID = $_GET['course'];
$dep_ID = $_GET['department'];
$sql = "DELETE FROM `course` WHERE courseID = $courseID";
$result = mysqli_query($connect,$sql);
header("Location: manage_course.php?department=$dep_ID");

?>