<?php

require("session.php");
require_once("connect/connection.php");

$newID = $_GET['department'];
$ID = $_GET['updateid'];
$selected_mtbl = $_GET['tbl_name'];

 if (isset($_POST['submit']) && isset($_POST['links'])){
        
        $links = $_POST['links'];
        $courseID = $_POST['courseID'];
        $dep_ID = $newID;
        

        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES["material"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "C:/xampp/htdocs/MockExamWebsit/course materials/$selected_mtbl/";
            $filename = basename($_FILES["material"]["name"]);
            $target_file = $target_dir . basename($_FILES["material"]["name"]);
            $db_name = "/MockExamWebsit/course materials/$selected_mtbl/$filename";
            move_uploaded_file($_FILES["material"]["tmp_name"], $target_file);
        
        
            $filename2 = basename($_FILES["notes"]["name"]);
            $target_file2 = $target_dir . basename($_FILES["notes"]["name"]);
            $db_name2 = "/MockExamWebsit/course materials/$selected_mtbl/$filename";
            move_uploaded_file($_FILES["notes"]["tmp_name"], $target_file2);
        }
        
        
        $sql = "UPDATE `$selected_mtbl` SET `ID`= $ID,`material_name`='$filename',`material_path`='$db_name',`note_name`='$filename2',`note_path`='$db_name2',`videolinks`='$links',`courseID`='$courseID',`dep_ID`='$dep_ID' WHERE ID = $ID";

        $query = mysqli_query($connect,$sql);

            if($query){
                
                header("Location: confirmation_msg.php?success=1&for=upmat&department=$newID");
                exit();
            }else{
            
                header("Location: confirmation_msg.php?success=0&for=upmat&department=$newID");
                exit();
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

        <title>Course Materials</title>

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
                                <a class="nav-link active" href="edit_course_material.php">
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
                    <?php 
                    
                    if (isset($_GET['department'])) {
                        

                        $sql1 = "SELECT * FROM `$selected_mtbl` WHERE ID = $ID";
                        $result = mysqli_query($connect,$sql1);
                        $row = mysqli_fetch_assoc($result);

                        $courseID = $row['courseID'];
                        $materialname= $row['material_name'];

                        $notename= $row['note_name'];
                        $links= $row['videolinks'];

                        $sql2 = "SELECT coursename from course WHERE courseID = $courseID";
                        $result2 = mysqli_query($connect,$sql2);
                        $row2 = mysqli_fetch_assoc($result2);

                        $coursename = $row2["coursename"]

                        
                        ?>
                       
                         <div class="custom-block bg-secondary text-center" >
                            <h6 class="text-white" ><?php 

                            echo $selected_mtbl ?></h6>
                         </div>

                            
                        <div class="card">
                        <div class="col-lg-10 col-12">
                            <div class="custom-block bg-white">
                                <form action="" method="post" enctype="multipart/form-data">
                                 
                                    <?php echo $coursename ?>

                                    <label for="course">Course</label>
                                        <select class="form-select" name="courseID" style="height:50px; width:600px;">
                                    <?php 
                                        $query3 = "SELECT * FROM `course`  WHERE dep_ID = $newID";
                                        $result3 = mysqli_query($connect,$query3);

                                        while($row = mysqli_fetch_assoc($result3)){

                                            $couID = $row['courseID'];
                                            $cou_name = $row['coursename'];
                                    ?>
                                    <option value="" disabled selected hidden>Please Choose...</option>
                                    <option value="<?php echo ($couID)?>"> <?php echo ($cou_name)?></option>
                                    <?php
                                        }
                                        
                                    ?>

                                    </select><br>
    
                                    <label for="material">course material</label><br>
                                    <input type="file" name="material" value="<?php echo $materialname ?>" required style="height:50px; width:600px;" class="form-control"/><br><br>
    
                                    <label for="notes" >Extra Notes</label><br>
                                    <input type="file" name="notes" value="<?php echo $notename ?>" required style="height:50px; width:600px;" class="form-control"/><br><br>
    
                                    <label for="links">Video links</label><br>
                                    <input type="text" name="links" value="<?php echo $links ?>" required style="height:50px; width:600px;" class="form-control"/><br><br>
    
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button><br><br>
                                    
                                    </form>
                                
                            </div>
                        </div>
                        </div>
                        <?php

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

        <?php 
        
        
        ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
