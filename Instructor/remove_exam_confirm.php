<?php $server_ip = gethostbyname(gethostname());?>
<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this Exam?")) {
    <?php 
        $ID = $_GET['removeid'];
    ?>
  document.location = "remove_exam.php?removeid=<?php echo $ID ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "manage_exams.php"
}
</script>