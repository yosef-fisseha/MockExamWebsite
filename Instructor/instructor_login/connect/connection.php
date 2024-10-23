<?php 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mockexam";

$connect = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

$server_ip = gethostbyname(gethostname());

/*
// Check connection
if ($mysqli -> connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}*/
?>