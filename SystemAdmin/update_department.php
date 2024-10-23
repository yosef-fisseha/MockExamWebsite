<?php
require("session.php");
require_once("connect/connection.php");

$dep_ID = $_GET['department'];

$sql = "SELECT * FROM department WHERE dep_ID = $dep_ID";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

$dep_name = $row['department'];

if(isset($_POST['department'])){

    $newDep = $_POST['department'];
    $sql = "UPDATE `department` SET `department`='$newDep' WHERE dep_ID = $dep_ID";
    $result = mysqli_query($connect,$sql);
    if($result){
        $query = mysqli_query($connect,"ALTER TABLE `$dep_name questions` RENAME TO `$newDep questions`");
        $query1 = mysqli_query($connect,"ALTER TABLE `$dep_name study materials` RENAME TO `$newDep study materials`");
        $query3 = mysqli_query($connect,"UPDATE `study materials` SET `tbl_name`='$newDep' WHERE dep_ID = $dep_ID");
        $path = "C:/xampp/htdocs/MockExamWebsit/course materials/";
        $oldname = "$path/$dep_name study materials";
        $newname = "$path/$newDep study materials";

        rename($oldname, $newname);
    }
    if($query && $query1){
        header("Location: manage_department.php");
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

        <title>Admin Home</title>

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
                                <a class="nav-link" href="add_department.php">
                                    <i class="bi bi-plus-circle"></i>
                                    Add department
                                </a>
                                
                                <li class="nav-item">
                                <a class="nav-link active" href="manage_department.php">
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
                        <h1 class="h2 mb-0" style="position:relative;">Update Department</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-10 col-12">
                            <div class="custom-block bg-white">
                            <form action="" method="post">
                                <label for="department">Department</label><br>
                                    <input type="text" name="department" id="department" required style="height:50px; width:600px;" class="form-control" value="<?php echo $dep_name?>"/><br><br>
    
                                    <button type="submit" name="submit" class="btn btn-success">Update</button><br><br>
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
