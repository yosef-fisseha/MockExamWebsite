<?php

$success = $_GET['success'];
$dep = $_GET['department'];
$for = $_GET['for'];


?>

<script type="text/javascript">

const add_ques = "add_ques";
const add_curs = "add_curs";
const upmat = "upmat";

if(<?php echo $success ?> == 1 && <?php echo $for ?> === add_ques) {
    
    
    alert('Completed Successfully')
    window.location.href = "add_question.php?department=<?php echo $dep?>"
    exit();
}else if(<?php echo $success ?> == 0 && <?php echo $for ?> === add_ques) {
    
    alert('ERROR!!!')
    window.location.href = "add_question.php?department=<?php echo $dep?>"
    exit();
}


else if(<?php echo $success ?> == 1 && <?php echo $for ?> === add_curs) {
    
    alert('Completed Successfully')
    window.location.href = "add_course_material.php?department=<?php echo $dep?>"
    exit();
}else if(<?php echo $success ?> == 0 && <?php echo $for ?> === add_curs) {
    
    alert('ERROR!!!')
    window.location.href = "add_course_material.php?department=<?php echo $dep?>"
    exit();
}


else if(<?php echo $success ?> == 1 && <?php echo $for ?> === upmat) {
    
    alert('Completed Successfully')
    window.location.href = "edit_course_material.php?department=<?php echo $dep?>"
    exit();
}else if(<?php echo $success ?> == 0 && <?php echo $for ?> === upmat) {
    
    alert('ERROR!!!')
    window.location.href = "edit_course_material.php?department=<?php echo $dep?>"
    exit();
}
</script>