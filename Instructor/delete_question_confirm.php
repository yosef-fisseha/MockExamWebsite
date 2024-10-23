<?php include "session.php" ?>
<script type="text/javascript">
if(window.confirm("Are you sure you want to delete this Question?")) {
  document.location = "delete_question.php?department=<?php $dep = $_GET['department']; echo $dep ?>&deleteid=<?php $ID = $_GET['deleteid']; echo $ID ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "edit_question.php?department=<?php echo $dep ?>&questionID=<?php echo $ID?>"
}
</script>