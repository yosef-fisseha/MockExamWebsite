<?php
require("session.php");
require_once"connect/connection.php";

$query = mysqli_query($connect,"SELECT * FROM result WHERE dep_ID = $department_ID");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Results</title>

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

            <div class="navbar-nav me-lg-2">
                <div class="nav-item text-nowrap d-flex align-items-center">
                    <div class="dropdown ps-3">
                        <?php 
                        if($noti_status == 1){
                        ?>
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navbarLightDropdownMenuLink">
                        <div class="spinner-grow spinner-grow-md" role="status" style="width: 6px; height: 6px; color:red">
                        <i class="bi bi-bell-fill"></i>
                        </div>
                        </a>
                        <?php ;}else
                        {
                        ?>
                        <a class="nav-link dropdown-toggle text-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="navbarLightDropdownMenuLink">
                            <i class="bi-bell"></i>
                            </span>
                        </a>
                        <?php
                        }
                        ?>

                        <ul class="dropdown-menu dropdown-menu-lg-end notifications-block-wrap bg-white shadow" aria-labelledby="navbarLightDropdownMenuLink" >
                            <small>Notifications</small>
                            <?php
                            while($admin_noti_row = mysqli_fetch_assoc($admin_noti_query)){
                                $message1 = $admin_noti_row["message"];
                            ?>
                            <li class="notifications-block border-bottom pb-2 mb-2">
                                <a class="dropdown-item d-flex  align-items-center" href="all_notifications.php">
                                    <div class="notifications-icon-wrap bg-success">
                                        <i class="notifications-icon bi bi-info-circle"></i>
                                    </div>
                                    <div>
                                        <span><?php echo $message1?></span>
                                        <p>Administrator</p>
                                    </div>
                                </a>
                            </li>
                            <?php }?>
                    </div>

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
                                <a class="nav-link" aria-current="page" href="instructor_home.php">
                                    <i class="bi-house-fill me-2"></i>
                                    Home
                                </a><br><br>
                            </li>
                            
                            <h7>Manage Courses</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_course.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add course
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="manage_course.php">
                                    <i class="bi bi-pencil-square"></i>
                                    Manage course
                                </a>
                            </li>

                            <h7>Manage Questions</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_question.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add Question
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="edit_question.php">
                                    <i class="bi bi-pencil-square"></i>
                                    Manage Questions
                                </a>
                            </li>
                            <h7>Manage Exams</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_exam.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add exam
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="manage_exams.php">
                                    <i class="bi bi-pencil-square"></i>
                                    Manage exam
                                </a>
                            </li>
                            
                            <h7>Manage Course Materials</h7>
                            <li class="nav-item">
                                <a class="nav-link" href="add_course_material.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add Course Material
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="edit_course_material.php">
                                    <i class="bi bi-pencil-square"></i>
                                    Manage Course Materials
                                </a>
                            </li>
                            
                            <h7>User Results</h7>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="user_results.php">
                                    <i class="bi bi-file-earmark"></i>
                                    User Results
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
                                <a class="nav-link" aria-current="page" href="manage_notifications.php">
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
                <style>
                    td{
                        font-size:120%;
                    }
                </style>
                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-10 px-md-4 border-start">
                    <div class="row my-4">
                        <div class="col-lg-12 col-12">
                            <div class="custom-block bg-white">
                            <div class="title-group mb-3">
                                <h1 class="h2 mb-0 text-center" style="position:relative;">Results</h1>
                            </div>
                            <table class="account-table table">
                                        <tr class="bg-color" style="background-color: #252424; color: white;">
                                            <td>User Name</td>
                                            <td>Category</td>
                                            <td>Exam Level</td>
                                            <td>Total Questions</td>
                                            <td>Correct Answer</td>
                                            <td>Exam Time</td>
                                            <td>Operation</td>
                                        </tr>
                                        <tr>
                                        <?php
                                        while($row = mysqli_fetch_assoc($query))
                                        {
                                        ?>
                                        <?php 
                                            $ID = $row['ID'];
                                            $username = $row['user_name'];
                                            $category = $row['category'];
                                            $exam_level = $row['exam_level'];
                                            $total_questions = $row['total_questions'];
                                            $correct_answer = $row['correct_answer'];
                                            $wrong_answer = $row['wrong_answer'];
                                            $exam_time = $row['exam_time'];
                                        ?>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $category ?></td>
                                            <td><?php echo $exam_level ?></td>
                                            <td><?php echo $total_questions ?></td>
                                            <td><?php echo $correct_answer ?></td>
                                            <td><?php echo $exam_time ?></td>
                                            <td><button class="btn btn-danger"><a href="remove_result.php?resultID=<?php echo $ID?>" class="text-light">Remove</a></button>
                                            </td>
                                            
                                            </td>          
                                        </tr>
                                            <?PHP
                                            }
                                            ?>
                                </table>
                            </div>
                        </div>
                    </div>

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
