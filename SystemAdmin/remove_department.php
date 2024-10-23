<?php
require_once("connect/connection.php");

$dep_ID = $_GET['department'];
$dep_name = $_GET['dep_name'];

$query1 = mysqli_query($connect,"DELETE FROM `department` WHERE dep_ID = $dep_ID");
$query2 = mysqli_query($connect,"DROP TABLE `$dep_name questions`");
$query3 = mysqli_query($connect,"DROP TABLE `$dep_name study materials`");
$query4 = mysqli_query($connect,"DELETE FROM `study materials` WHERE dep_ID = $dep_ID");

$dir_name = "$dep_name materials";
$path = "C:/xampp/htdocs/MockExamWebsit/course materials/$dir_name";

function deleteDirectory($dirPath) {
    if (is_dir($dirPath)) {
       $files = scandir($dirPath);
       foreach ($files as $file) {
          if ($file !== '.' && $file !== '..') {
             $filePath = $dirPath . '/' . $file;
             if (is_dir($filePath)) {
                deleteDirectory($filePath);
             } else {
                unlink($filePath);
             }
          }
       }
       rmdir($dirPath);
    }
 }
 
 deleteDirectory($Path);

header("Location: manage_department.php");

?>