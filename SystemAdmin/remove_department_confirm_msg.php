<?php
require_once("connect/connection.php");

$dep_ID = $_GET['department'];
$query = mysqli_query($connect,"SELECT `department` FROM department WHERE dep_ID = $dep_ID");
$row = mysqli_fetch_assoc($query);
$dep_name = $row['department'];

?>

<script type="text/javascript">
if(window.confirm("ATENTION: by removing the '<?php echo $dep_name?> department' you are also removing '<?php echo $dep_name?> questions' and '<?php echo $dep_name?> study materials'. Are you sure you want to remove <?php echo $dep_name?> Department?")) {
  document.location = "remove_department.php?department=<?php echo $_GET['department'] ?>&dep_name=<?php echo $dep_name ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "manage_department.php?department=<?php echo $_GET['department'] ?>"
}
</script>