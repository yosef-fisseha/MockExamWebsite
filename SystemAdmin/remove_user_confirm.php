<script type="text/javascript">
if(window.confirm("Are you sure you want to remove this user?")) {
  document.location = "remove_user.php?removeid=<?php $ID = $_GET['removeid']; echo $ID ?>";
  alert('SUCCESSFULLY COMPLETED!!')
}else
{
    alert('CANCELED!!!!')
    window.location.href = "remove_user_page.php"
}
</script>