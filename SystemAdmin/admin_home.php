<?php
require("session.php");
require_once "connect/connection.php";

$query1 = mysqli_query($connect,"SELECT * from `system_user`");
$sys_usr_count = mysqli_num_rows($query1); 

$query2 = mysqli_query($connect,"SELECT * from `instructor`");
$sys_inst_count = mysqli_num_rows($query2); 

$query3 = mysqli_query($connect,"SELECT * from `department`");
$Dep_num = mysqli_num_rows($query3); 

$query4 = mysqli_query($connect,"SELECT * FROM `system_user` INNER JOIN department ON system_user.dep_ID = department.dep_ID");

$query5 = mysqli_query($connect,"SELECT * FROM instructor");

$query6 = mysqli_query($connect,"SELECT * FROM department");


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
                                <a class="nav-link active" aria-current="page" href="admin_home.php">
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
                
                        <div class="col-lg-12 col-12">
                            <div class="custom-block bg-white">

                            <div class="grey-bg container-fluid">
                                <section id="minimal-statistics">
                                    <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12"> 
                                        <div class="card">
                                        <div class="card-content">
                                            <div class="card-body bg-danger">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                <i class="icon-pencil primary font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                <h3><?php echo $sys_usr_count ?></h3>
                                                <span>Total Users(Students)</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="card">
                                        <div class="card-content">
                                            <div class="card-body bg-info">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                <h3><?php echo $sys_inst_count ?></h3>
                                                <span>Total Instructors</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="card">
                                        <div class="card-content">
                                            <div class="card-body bg-warning">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                <i class="icon-graph success font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                <h3><?php  echo $Dep_num ?></h3>
                                                <span>total Departments</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <div class="card">
                                        <div class="card-content">
                                            <div class="card-body bg-success">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                <i class="icon-pointer danger font-large-2 float-left"></i>
                                                </div>
                                                <div class="media-body text-right">
                                                <h3><?php echo $sys_inst_count + $sys_usr_count ?></h3>
                                                <span>Total System Users</span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-12 col-12">
                            <div class="custom-block bg-white">
                            <h5 class="text-center" >Users(Students)</h5><br>
                            <table class="account-table table">
                                        <tr class="bg-color" style="background-color: #252424; color: white;">
                                            <td>ID</td>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>User Name</td>
                                            <td>Email</td>
                                            <td>Contact</td>
                                            <td>Department</td>
                                            <td>Account Status</td>
                                        </tr>
                                        <tr>
                                        <?php
                                        while($row = mysqli_fetch_assoc($query4))
                                        {
                                        ?>
                                        <?php 
                                            $ID = $row['ID'];
                                            $firstame = $row['firstname'];
                                            $lastname = $row['lastname'];
                                            $username = $row['username'];
                                            $email = $row['email'];
                                            $contact = $row['contact'];
                                            $status = $row['status'];
                                            $department =$row['department'];
                                        ?>
                                            <td><?php echo $ID ?></td>
                                            <td><?php echo $firstame ?></td>
                                            <td><?php echo $lastname ?></td>
                                            <td><?php echo $username  ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $contact ?></td>
                                            <td><?php echo $department ?></td>
                                            <td><?php if($status == 1){
                                                echo "Activated";
                                            }else
                                            {
                                                echo "Inactive";
                                            }
                                            ?></td>         
                                        </tr>
                                            <?PHP
                                            }
                                            ?>
                                    </table>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-contact">
                                <h5 class="text-center" >Instructors</h5><br>
                                <table class="account-table table">
                                        <tr class="bg-color" style="background-color: #252424; color: white;">
                                            <td>ID</td>
                                            <td>Email</td>
                                        </tr>
                                        <tr>
                                        <?php
                                        while($row = mysqli_fetch_assoc($query5))
                                        {
                                        ?>
                                        <?php 
                                            $ID = $row['ID'];
                                            $email = $row['email'];
                                        ?>
                                            <td><?php echo $ID ?></td>
                                            <td><?php echo $email ?></td>
                                            </td>          
                                        </tr>
                                            <?PHP
                                            }
                                            ?>
                                </table>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-contact">
                            <h5 class="text-center" >Departments</h5><br>
                                <table class="account-table table">
                                        <tr class="bg-color" style="background-color: #252424; color: white;">
                                            <td>ID</td>
                                            <td>Department</td>
                                        </tr>
                                        <tr>
                                        <?php
                                        while($row = mysqli_fetch_assoc($query6))
                                        {
                                        ?>
                                        <?php 
                                            $dep_ID = $row['dep_ID'];
                                            $department = $row['department'];
                                        ?>
                                            <td><?php echo $dep_ID ?></td>
                                            <td><?php echo $department ?></td>
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
