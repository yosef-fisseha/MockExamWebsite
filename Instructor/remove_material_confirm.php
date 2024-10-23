<?php $server_ip = gethostbyname(gethostname());?>
<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this material?")) {
    <?php 
        $ID = $_GET['removeid'];
        $dep = $_GET['department'];
        $selected_mtbl = $_GET['tbl_name'];
    ?>
  document.location = "remove_materials.php?removeid=<?php echo $ID ?>&department=<?php echo $dep?>&tbl_name=<?php echo $selected_mtbl?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "edit_course_material.php?department=<?php echo $dep?>"
}
</script>