<?php

require("session.php");
require_once("connect/connection.php");



    $newID = $department_ID;
    $query = "SELECT tbl_name FROM `department` INNER JOIN `questions` on department.dep_ID = questions.dep_ID WHERE department.dep_ID = $newID";
    $result = mysqli_query($connect,$query);

    while($row = mysqli_fetch_assoc($result)){

        $selected_qtbl = $row['tbl_name'];
        
    }
    
    if ($_SERVER['REQUEST_METHOD'] ==  'POST' && isset($_POST['submit'])) {

        
   
        $conn= mysqli_connect('localhost','root','','mockexam') or die('Connection Failed : ' .mysqli_connect_error());
   
        if(isset($_POST['option_a']) && isset($_POST['option_b']) && isset($_POST['option_c']) && isset($_POST['option_d']) && isset($_POST['correct_answer']) && isset($_POST['answer_description']) && isset($_POST['course']) && isset($_POST['model_year'])){
        
            
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $correct_ans = $_POST['correct_answer'];
            $answer_description = $_POST['answer_description'];
            $dep_ID = $newID;
            $courseID = $_POST['course'];
            $def_lvl_ID = $_POST['deficulty_level'];
            $model_or_exam =$_POST['model_or_exam'];
            $exam_year = $_POST['model_year'];

            if($_FILES["img_question"]["error"] == UPLOAD_ERR_OK){
                
                    $target_dir = "C:/xampp/htdocs/MockExamWebsit/SystemUser/question_images/";
                    $filename = basename($_FILES["img_question"]["name"]);
                    $target_file = $target_dir . basename($_FILES["img_question"]["name"]);
                    $db_name = "question_images/$filename";
                    move_uploaded_file($_FILES["img_question"]["tmp_name"], $target_file);

                    $sql = "INSERT INTO `$selected_qtbl`(`questionID`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `answer_description`,`level_ID`,`model_or_exam`, `dep_ID`, `courseID`, `exam_year`) VALUES ('','$db_name','$option_a','$option_b','$option_c','$option_d','$correct_ans','$answer_description','$def_lvl_ID','$model_or_exam','$dep_ID','$courseID','$exam_year')" ; 
            }else
            {
            $question = $_POST['question'];
            $sql = "INSERT INTO `$selected_qtbl`(`questionID`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `answer_description`,`level_ID`,`model_or_exam`, `dep_ID`, `courseID`, `exam_year`) VALUES ('','$question','$option_a','$option_b','$option_c','$option_d','$correct_ans','$answer_description','$def_lvl_ID','$model_or_exam','$dep_ID','$courseID','$exam_year')" ; 
            }
            $query = mysqli_query($conn,$sql);

            if($query){
                header("Location: confirmation_msg.php?success=1&for=add_ques&department=$newID");
                exit();
            }else{?>
                <script>alert('Error Occurred');</script><?php
                header("Location: confirmation_msg.php?success=0&for=add_ques&department=$newID");
                exit();
            }
                
        }
    
    }
    
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Add New Question</title>

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

                            <h7>Manage Questions</h7>
                            <li class="nav-item">
                                <a class="nav-link active" href="add_question.php">
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

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-10 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h3 class="h2 mb-0 text-center" style="position:relative;">Add New Question</h3>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-8 col-12" style="margin-left: 15%;">
                            <div class="custom-block bg-white">
                            
                                <form action="" class="custom-form profile-form" method="post" enctype="multipart/form-data" role="form">

                                        <label for="course_name">Course</label>
                                        <select class="form-select form-control" name="course"  required>
                                    <?php 
                                        $query = "SELECT * FROM `course`  WHERE dep_ID = $newID";
                                        $result = mysqli_query($connect,$query);

                                        while($row = mysqli_fetch_assoc($result)){

                                            $couID = $row['courseID'];
                                            $cou_name = $row['coursename'];
                                    ?>
                                    <label for="course_name">Course ID</label> 
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <option value="<?php echo ($couID)?>"> <?php echo ($cou_name)?></option>
                                    <?php
                                        }
                                        
                                    ?>
                                    </select>
    
                                    
                                    <input class="form-control" type="text" name="question" id="question" placeholder="Question"/>
                                        
                                    <label for="img_question">Image Question (Optional)</label>
                                    <input class="form-control" type="file" name="img_question" id="img_question"  />
    
                                    
                                    <input class="form-control" type="text" name="option_a" id="option_a" placeholder="Option A" required />
    
                                    
                                    <input class="form-control" type="text" name="option_b" id="option_b" required placeholder="Option B" />
    
                                    
                                    <input class="form-control" type="text" name="option_c" id="option_c" required placeholder="Option C"/>
    
                                    
                                    <input class="form-control" type="text" name="option_d" id="option_d" required placeholder="Option D"/>
    
                                    
                                    <input class="form-control" type="text" name="correct_answer" id="correct_answer" required placeholder="Correct Answer"/>

                                    
                                    <input class="form-control" type="text" name="answer_description" id="answer_description" required placeholder="Answer Discription"/>
                                    
                                    <label for="deficulty_level">Category</label><br>

                                    <select class="form-control" class="form-select" name="deficulty_level">
                                    <?php 
                                        $query = "SELECT * FROM exam_category WHERE department = 'all' OR department = '$department_name'";
                                        $result = mysqli_query($connect,$query);

                                        while($row = mysqli_fetch_assoc($result)){
                                            
                                            $exam_level = $row['exam_level'];
                                            $level_ID = $row['level_ID'];
                                    ?>
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <option value="<?php echo ($level_ID)?>"> <?php echo ($exam_level)?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                    
                                    
                                    <input class="form-control" type="text" name="model_or_exam" id="model_or_exam" placeholder="Model or exam" required />

                                    
                                    <input class="form-control" type="number" name="model_year" id="model_year" required placeholder="Published Year"/>
    
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button><br><br>
                                    </form>
                                
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