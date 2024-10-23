<?php
session_start();

$email = $_SESSION['email'];

if(empty($_SESSION['email'])){
    header("location: http://localhost/MockExamWebsit/SystemAdmin/admin_login/index.php");
}
?>