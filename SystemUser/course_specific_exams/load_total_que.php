<?php 
require("session.php");
require_once("connect/connection.php");

$total_que = 0;

$query = mysqli_query($connect,"SELECT `tbl_name` FROM `questions` WHERE dep_ID = $dep_ID");
$row = mysqli_fetch_assoc($query);
$que_tbl_name = $row['tbl_name'];

$query1 = mysqli_query($connect,"SELECT * FROM `$que_tbl_name` WHERE `courseID` = $_SESSION[courseID]");
$total_que = mysqli_num_rows($query1);
echo $total_que;
?>
<script type="text/javascript" >
    total_que = <?php $total_que?>
</script>