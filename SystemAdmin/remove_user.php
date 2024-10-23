<?php
$conn= mysqli_connect('localhost','root','','mockexam') or die('Connection Failed : ' .mysqli_connect_error());

$ID = $_GET['removeid'];
$sql = "DELETE FROM `system_user` WHERE ID = $ID";
$result = mysqli_query($conn,$sql);
header("Location: remove_user_page.php");
?>