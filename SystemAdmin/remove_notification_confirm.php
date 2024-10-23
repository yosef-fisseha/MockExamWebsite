<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this Notification?")) {
    <?php 
        $ID = $_GET['removeid'];
    ?>
  document.location = "remove_notification.php?removeid=<?php echo $ID ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "notifications.php"
}
</script>