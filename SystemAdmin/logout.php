<?php
    session_start();
    unset($_SESSION['email']);
    session_destroy();

    $server_ip = gethostbyname(gethostname());

    header('location: http://'.$server_ip.'/MockExamWebsit/SystemAdmin/admin_login/index.php');
?>
