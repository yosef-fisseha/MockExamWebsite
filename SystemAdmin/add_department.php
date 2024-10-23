<?php
require("session.php");
require_once("connect/connection.php");

if(isset($_POST['department'])){

    $department = $_POST['department'];

    $result = mysqli_query($connect,"INSERT INTO `department`(`dep_ID`, `department`) VALUES ('','$department')");

    $query2 = mysqli_query($connect,"SELECT * from `department` where department = '$department'");
    $row2 = mysqli_fetch_assoc($query2);
    $dep_ID = $row2['dep_ID'];
 
    $folder_name = "$department study materials";
    mkdir("C:/xampp/htdocs/MockExamWebsit/course materials/$folder_name");

    $query = mysqli_query($connect,"INSERT INTO `study materials`(`mat_ID`, `tbl_name`, `dep_ID`) VALUES ('','$department study materials','$dep_ID')");

    $query = mysqli_query($connect,"INSERT INTO `questions`(`ques_ID`, `tbl_name`, `dep_ID`) VALUES ('','$department questions','$dep_ID')");
    
    
    $sql2 = "CREATE TABLE `mockexam`.`$department questions` (`questionID` INT(10) NOT NULL AUTO_INCREMENT ,
            `question` VARCHAR(750) NOT NULL ,
            `option_a` VARCHAR(255) NOT NULL , 
            `option_b` VARCHAR(255) NOT NULL ,
            `option_c` VARCHAR(255) NOT NULL ,
            `option_d` VARCHAR(255) NOT NULL ,
            `correct_ans` VARCHAR(5) NOT NULL ,
            `answer_description` VARCHAR(500) NOT NULL ,
            `level_ID` INT(10) NOT NULL ,
            `model_or_exam` VARCHAR(50) NOT NULL ,
            `dep_ID` INT(10) NOT NULL ,
            `courseID` INT(10) NOT NULL ,
            `exam_year` INT(10) NOT NULL ,
            PRIMARY KEY (`questionID`), 
            FOREIGN KEY (`level_ID`) REFERENCES exam_category(`level_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY (`dep_ID`) REFERENCES department(`dep_ID`) ON DELETE CASCADE ON UPDATE CASCADE, 
            FOREIGN KEY (`courseID`)REFERENCES course(`courseID`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE = InnoDB; ";
    $result2 = mysqli_query($connect,$sql2);

    $sql3 = "CREATE TABLE `mockexam`.`$department study materials` (`ID` INT(10) NOT NULL AUTO_INCREMENT ,
            `material_name` VARCHAR(500) NOT NULL ,
            `material_path` VARCHAR(500) NOT NULL , 
            `note_name` VARCHAR(500) NOT NULL ,
            `note_path` VARCHAR(500) NOT NULL ,
            `videolinks` VARCHAR(500) NOT NULL ,
            `courseID` INT(10) NOT NULL ,
            `dep_ID` INT(10) NOT NULL ,
            PRIMARY KEY (`ID`), 
            FOREIGN KEY (`dep_ID`) REFERENCES department(`dep_ID`) ON DELETE CASCADE ON UPDATE CASCADE, 
            FOREIGN KEY (`courseID`)REFERENCES course(`courseID`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE = InnoDB; ";
    $result3 = mysqli_query($connect,$sql3);

    if($result){
        ?>
        <script type ="text/JavaScript">alert("Completed Successfully")</script>   
        <?php
    }else{?>
        <script type ="text/JavaScript">alert("Error")</script>
        <?php
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

        <title>Add Department</title>

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
                                        <small>Admin</small>
                                        <a href="#"><?php echo $email ?></a>
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
                                <a class="nav-link active" href="add_department.php">
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
                        <h1 class="h2 mb-0" style="position:relative;">Department</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-10 col-12">
                            <div class="custom-block bg-white">
                                <form action="" class="custom-form profile-form" method="post">
                                <label for="links">Department</label><br>
                                    <input type="text" name="department" id="department" required style="height:50px; width:600px;" class="form-control" placeholder="enter department"/>
    
                                    <button type="submit" name="submit" class="btn btn-primary">ADD</button>
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