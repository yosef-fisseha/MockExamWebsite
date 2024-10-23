<?php 

require("connect/connection.php");

if(isset($_SESSION['courseID'])){
$query = mysqli_query($connect,"SELECT * FROM `$dep_name questions` WHERE `courseID`= $_SESSION[courseID]");
$q = 0;
while($row = mysqli_fetch_array($query)){
    
    $que_num[$q] = $row['questionID'];
    $q++;
}
$que_num_size = sizeof($que_num);
}
?>
<script type="text/javascript">
var que_num = <?php echo json_encode($que_num); ?>;
que_num_size = que_num.length-1;
</script>