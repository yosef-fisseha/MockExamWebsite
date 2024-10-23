<?php
    session_start();
    unset($_SESSION['username']);
    session_destroy();

    $server_ip = gethostbyname(gethostname());
    
    header('location: http://'.$server_ip.'/MockExamWebsit/SystemUser/user_login/index.php');
?>