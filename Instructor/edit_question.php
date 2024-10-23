<?php

require("session.php");
require_once("connect/connection.php");

    $newID = $department_ID;
    $query = "SELECT `tbl_name` FROM `department` INNER JOIN `questions` on department.dep_ID = questions.dep_ID WHERE department.dep_ID = $newID";
    $result = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($result)){

        $selected_qtbl = $row['tbl_name'];
    }
    $sql = mysqli_query($connect,"SELECT * FROM `$selected_qtbl`");
    $total_ques = mysqli_num_rows($sql);
    $i = 0;
    while($row=mysqli_fetch_assoc($sql)){
        $que_num[$i] = $row['questionID']; 
        $i++;
    } 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Manage Question</title>

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

                            <h7>Manage Questions</h1>
                            <li class="nav-item">
                                <a class="nav-link" href="add_question.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add Question
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link active" href="edit_question.php">
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
                            <h7>Manage Course Materials</h1>
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
                                <a class="nav-link" aria-current="page" href="user_results.php">
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

                            <li class="nav-item">
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

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-10 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0" style="position:relative;">Manage Question
                    </div>
                    <div class="row my-3">
                    <div class="custom-block bg-white col-lg-10">
                        <div class="col-lg-6 col-12">
                            <div class="custom-block bg-white">
                                
                                <form action="" class="custom-form profile-form" method="GET">

                                    <input type="text" name="questionID" id="questionID" required value="<?php if(isset($_GET['questionID'])){echo $_GET['questionID'];} ?>" class="form-control" placeholder="Question ID"/>

                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>  
                            </div> 
                        </div>
                        <h7 style="float:inline-end" >Total Questions:<?php  echo $total_ques; ?></h7>
                    </div>
                        <?php
                            
                            $conn= mysqli_connect('localhost','root','','mockexam') or die('Connection Failed : ' .mysqli_connect_error());
                                if (isset($_GET['questionID'])) {
                                    $questionID = $_GET['questionID'];
                                    $sql = "SELECT * FROM `$selected_qtbl` WHERE `questionID`= $questionID";
                                    $result = mysqli_query($conn,$sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        foreach ($result as $row) {
                                            $question = $row['question'];
                                            $option_a = $row['option_a'];
                                            $option_b = $row['option_b'];
                                            $option_c = $row['option_c'];
                                            $option_d = $row['option_d'];
                                            $correct_ans = $row['correct_ans'];
                                            $answer_description = $row['answer_description'];
                                            $dep_ID = $selected_qtbl;
                                            $courseID = $row['courseID']
                                            ?>        
                                            <div class="row my-4">
                                            <div class="col-lg-10 col-12">
                                                
                                                <div class="custom-block bg-white">

                                                    <p><?php echo $questionID?>. &nbsp; 
                                                    
                                                    
                                                    <?php
                                                    $path = "http://$server_ip/MockExamWebsit/SystemUser/";
                                                        if (strpos($question,'question_images/') !== false) {
                                                            ?>
                                                            <img src="<?php echo $path.$question; ?>">
                                                                <?php
                                                        }else{
                                                            echo $question;
                                                        }
                                                        ?></p><br>
                                                    
                                                    <p>A. <?php echo $option_a?></p><br>
                                                    
                                                    <p>B. <?php echo $option_b?></p><br>
                                                    
                                                    <p>C. <?php echo $option_c?></p><br>
                                                    
                                                    <p>D. <?php echo $option_d?></p><br>

                                                    <p>correct Answer: &nbsp; <?php echo $correct_ans ?> </p><br>
                                                    <p><?php echo $answer_description?> </p><br><br>

                                                    <button type="button" id="previousbtn" class="btn btn-warning" > <a href="edit_question.php?department=<?php echo $newID ?>&questionID=<?php echo $questionID - 1?>" class="text-dark"> < Previous Question</button>

                                                    <button type="button" id="nextbtn" class="btn btn-success" style="margin-left: 20px;"> <a href="edit_question.php?department=<?php echo $newID ?>&questionID=<?php echo $questionID + 1?>" class="text-light"> Next Question ></button>

                                                    <button class="btn btn-primary float-end"><a href="update_question.php?department=<?php echo $newID ?>&updateid=<?php echo $questionID ?>" class="text-light">Update Question</a></button> 

                                                    <button class="btn btn-danger float-end" style="margin-right: 20px;"><a href="delete_question_confirm.php?department=<?php echo $newID ?>&deleteid=<?php echo $questionID ?>" class="text-light">Delete Question</a></button>
                                                                
                                                </div>
                                            </div>
                                        <?php
                                        }          
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="custom-block bg-white">
                                         <h3 class="text-center" ><?php echo'No Record Found' ?></h3><br>
                                        <button type="button" id="previousbtn" class="btn btn-warning" > <a href="edit_question.php?department=<?php echo $newID ?>&questionID=<?php echo $questionID - 1?>" class="text-dark"> < Previous Question</button>

                                        <button type="button" id="nextbtn" class="btn btn-success" style="margin-left: 20px;"> <a href="edit_question.php?department=<?php echo $newID ?>&questionID=<?php echo $questionID + 1?>" class="text-light"> Next Question ></button>

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
