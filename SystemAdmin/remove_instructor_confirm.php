<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this Instructor?")) {
  document.location = "remove_instructor.php?removeid=<?php $ID = $_GET['removeid']; echo $ID ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "manage_instructor.php"
}
</script>