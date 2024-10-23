<?php
session_start();
require_once("connect/connection.php");

$server_ip = gethostbyname(gethostname());

if(empty($_SESSION['username'])){
    header("location: http://$server_ip/MockExamWebsit/SystemUser/user_login/index.php");
}else{
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$dep_ID = $_SESSION['dep_ID'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];

$sql = "SELECT department FROM `department` WHERE `dep_ID` = $dep_ID";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$dep_name = $row['department'];


$noti_status_query = mysqli_query($connect,"SELECT `notification_status` FROM `system_user` WHERE `email` = '$email'");
  $status_row = mysqli_fetch_assoc($noti_status_query);
  $noti_status = $status_row['notification_status'];

  $inst_noti_query = mysqli_query($connect,"SELECT * FROM instructor_notification WHERE `dep_ID` = $dep_ID ORDER BY ID DESC LIMIT 2 ");

  $admin_noti_query = mysqli_query($connect,"SELECT * FROM admin_notification WHERE `target` = 'User' ORDER BY ID DESC LIMIT 2 ");

}
?>