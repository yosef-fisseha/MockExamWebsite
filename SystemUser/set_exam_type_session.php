<?php
require("session.php");
require_once ("connect/connection.php");
$exam_category=$_GET["exam_category"];
$_SESSION["exam_category"]=$exam_category;
$query=mysqli_query($connect, "select * from exam_category where level_ID ='$exam_category'");
while($row = mysqli_fetch_array($query))
{
    $_SESSION["exam_time"]=$row["exam_time"];
}
$date = date ("Y-m-d H:i:s");
$_SESSION["end_time"]=date ("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"]="yes";
?>