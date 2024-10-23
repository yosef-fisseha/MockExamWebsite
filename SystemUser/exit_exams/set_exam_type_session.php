<?php
require("session.php");
require_once ("connect/connection.php");
$exam_year=$_GET["exam_year"];
$_SESSION["exam_year"]=$exam_year;
$query=mysqli_query($connect, "SELECT * FROM `$dep_name questions` where model_or_exam = 'exam' && exam_year ='$exam_year'");
$exam_time = mysqli_num_rows($query);

$_SESSION["exam_time"]= $exam_time;

$date = date ("Y-m-d H:i:s");
$_SESSION["end_time"]=date ("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>