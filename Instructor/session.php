<?php
session_start();
require_once "connect/connection.php";

$server_ip = gethostbyname(gethostname());

if(empty($_SESSION['email']) && empty($_SESSION['dep_ID'])){
    header("location: http://$server_ip/MockExamWebsit/Instructor/instructor_login/index.php");
}

$email = $_SESSION['email'];
$department_ID = $_SESSION['dep_ID'];

$sql = "SELECT department FROM `department` WHERE `dep_ID` = $department_ID";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$department_name = $row['department'];

$noti_status_query = mysqli_query($connect,"SELECT `notification_status` FROM `instructor` WHERE `email` = '$email'");
  $status_row = mysqli_fetch_assoc($noti_status_query);
  $noti_status = $status_row['notification_status'];

$admin_noti_query = mysqli_query($connect,"SELECT * FROM admin_notification WHERE `target` = 'Instructor' ORDER BY ID DESC LIMIT 3 ");


?>