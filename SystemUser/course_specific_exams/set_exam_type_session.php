<?php
require("session.php");
require_once ("connect/connection.php");
$courseID=$_GET["courseID"];
$_SESSION["courseID"]=$courseID;
$query=mysqli_query($connect, "SELECT * from `$dep_name questions` where courseID ='$courseID'");
$exam_time = mysqli_num_rows($query);


$_SESSION["exam_time"]= $exam_time;

$date = date ("Y-m-d H:i:s");
$_SESSION["end_time"]=date ("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>