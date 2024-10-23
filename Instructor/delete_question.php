<?php

require("session.php");
require_once("connect/connection.php");
if(isset($_GET['department'])){
    $newID = $_GET['department'];
    $query = "SELECT tbl_name FROM `department` INNER JOIN `questions` on department.dep_ID = questions.dep_ID WHERE department.dep_ID = $newID";
    $result = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($result)){

        $selected_qtbl = $row['tbl_name'];
    }
}

$dep = $_GET['department'];
$ID = $_GET['deleteid'];
$sql = "DELETE FROM `$selected_qtbl` WHERE questionID = $ID";
$result = mysqli_query($connect,$sql);
header("Location: edit_question.php?department=$newID&questionID=$ID");
?>