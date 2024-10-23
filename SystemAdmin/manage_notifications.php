<?php
require "session.php";
require_once "connect/connection.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Add New Course</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/mockexam.css" rel="stylesheet">


    </head>
    
    <body>
        <header class="navbar sticky-top flex-md-nowrap">
            <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
                <a class="navbar-brand" href="index.html">
                    <i class="bi-box"></i>
                    Mock Exam
                </a>
            </div>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            

                    <div class="dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle h3"></i><br>
                        
                        </a>
                        <ul class="dropdown-menu bg-white shadow">
                            <li>
                                <div class="dropdown-menu-profile-thumb d-flex">
                                    
                                    <i class="bi bi-person-fill profile-image img-fluid me-3"></i>

                                    <div class="d-flex flex-column">
                                        <small>Instructor</small>
                                        <a href="#"><?php echo $email ?></a>
                                    </div>
                                </div>
                            </li>

                            <li>
                            <div class="dropdown-menu-profile-thumb d-flex"> 
                                <i class="bi bi-journal-bookmark profile-image img-fluid me-3"></i>  
                            <div class="d-flex flex-column">
                                <small>Department</small>
                                <small><?php echo $department_name ?></small>
                            </div>
                            </div>
                            </li>
                            <li class="border-top mt-3 pt-2 mx-4">
                                <a class="dropdown-item ms-0 me-0" href="#">
                                    <i class="bi-box-arrow-left me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
            <nav id="sidebarMenu" class="">
                    <div class="position-fixed py-4 px-3 sidebar-sticky ">
                    <ul class="nav flex-column h-100">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="admin_home.php">
                                    <i class="bi-house-fill me-2"></i>
                                    Home
                                </a><br><br>
                            </li>
                            <h7>Manage Department</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_department.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add department
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="manage_department.php">
                                    <i class="bi bi-pencil-square"></i>
                                    Manage Department
                                </a>
                            </li>
                            <h7>Manage Instructor</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_Instructor.php">
                                    <i class="bi bi-person-fill"></i>
                                    Add Instructor
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="manage_Instructor.php">
                                    <i class="bi bi-person-x-fill"></i>
                                    Manage Instructor
                                </a>
                            </li>

                           
                            <h7>Manage Users</h7>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="remove_user_page.php">
                                    <i class="bi bi-person-x-fill"></i>
                                    Manage Users
                                </a>
                            </li>

                            <h7>Notifications</h7>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="notification.php">
                                    <i class="bi bi-file-earmark"></i>
                                    Create New Notification
                                </a>
                            </li>

                            <li class="nav-item h-100">
                                <a class="nav-link active" aria-current="page" href="manage_notifications.php">
                                    <i class="bi bi-file-earmark"></i>
                                    Manage Notification
                                </a>
                            </li>

                            <li class="nav-item border-top mt-auto pt-2">
                                <a class="nav-link" href="logout.php">
                                    <i class="bi-box-arrow-left me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-10 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0" style="position:relative;">Manage Notifications</h1>
                    </div>
                    <?php 
                    
                        $query = mysqli_query($connect,"SELECT * FROM admin_notification ORDER BY ID DESC");
                        if(mysqli_num_rows($query) == 0){
                            echo "No Record Found";
                        }else{
                            while($row = mysqli_fetch_assoc($query)){
                                $ID = $row['ID'];
                                $message_subject = $row['message_subject'];
                                $message = $row['message'];
                                $date = $row['date'];

                                ?>
                                <div class="card text-dark bg-rgb mb-5 col-lg-8" style="border-radius: 20px;">
                                    <div class="card-header bg-gray"><h6 style="font-size: medium; font-weight: lighter;">Subject: <?php echo $message_subject ?></h6></div>
                                        <div class="card-body" style="font-size: large;">
                                            <h7 class="card-text" style="font-size: medium; font-weight: lighter;"> Message: <?php echo $message ?></h7><br><br>
                                            
                                            <button class="btn btn-danger" style="margin-left: 10px; font-size:small; border-radius:50px"><a href="remove_notification_confirm.php?removeid=<?php echo $ID ?>" class="text-light">Remove</a></button><br>

                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    
                    ?>                     
                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-12 col-12">
                                    
                                </div>

                            </div>
                        </div>
                    </footer>
                </main>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
