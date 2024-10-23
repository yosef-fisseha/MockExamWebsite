<?php
    session_start();

    $server_ip = gethostbyname(gethostname());


    unset($_SESSION['email']);
    session_destroy();
    header('location: http://'.$server_ip.'/MockExamWebsit/Instructor/instructor_login/index.php');
?>
