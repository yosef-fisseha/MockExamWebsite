
<?php $server_ip = gethostbyname(gethostname());?>
<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this course?")) {
  document.location = "remove_course.php?course=<?php echo $_GET['course'] ?>&department=<?php echo $_GET['department'] ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "manage_course.php?department=<?php echo $_GET['department'] ?>"
}
</script>