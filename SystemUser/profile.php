<?php
 require("session.php");
 require_once("connect/connection.php");


 $sql = "SELECT * FROM `system_user` WHERE email = '$email'";
 $result = mysqli_query($connect,$sql);
 $row = mysqli_fetch_assoc($result);

 $ID = $row['ID'];
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $username =$row['username'];
 $dep_ID = $row['dep_ID'];
 $contact =$row['contact'];

 if ($_SERVER['REQUEST_METHOD'] ==  'POST' && isset($_POST['submit'])) {
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['department']) && isset($_POST['contact'])){
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username =$_POST['username'];
        $dep_ID = $_POST['department'];
        $contact =$_POST['contact'];

        $sql = "UPDATE `system_user` SET `firstname`='$firstname',`lastname`='$lastname',`username`='$username',`dep_ID`='$dep_ID',`contact`='$contact' WHERE ID = '$ID'";
        $query = mysqli_query($connect,$sql);
        
        if($query){

            $sql1 = "SELECT * FROM `system_user` WHERE email = '$email'";
            $result1 = mysqli_query($connect,$sql1);
            $row1 = mysqli_fetch_assoc($result1);

            
            $firstname = $row1['firstname'];
            $lastname = $row1['lastname'];
            $username =$row1['username'];
            $depID = $row1['dep_ID'];
            

            $_SESSION['fname'] = $firstname;
            $_SESSION['lname'] = $lastname;
            $_SESSION['dep_ID'] = $depID;
            $_SESSION['username'] = $username;
          
            ?>
            <script type ="text/JavaScript">alert("Update Completed Successfully")</script>;    
            <?php
        }else{?>
            <script type ="text/JavaScript">alert("Error, Update Aborted")</script>;
            <?php
        }
    }
    header("Refresh:0");
 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mock Exam Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.jpg" alt="">
        <span class="d-none d-lg-block">MOCK EXAM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

        <?php 
            if($noti_status == 1){
            ?>
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" style="margin-right: 40px;">
            <div class="spinner-grow spinner-grow-sm" role="status">
              <i class="bi bi-bell"></i>
                <span class="visually-hidden">Loading...</span>
            </div>
          </a>
          <?php
            }else{
          ?>
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>  
          </a>
          <?php
            }
          ?><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style=" max-width: 300px; overflow: hidden; text-overflow: 
                      ellipsis;white-space: nowrap;">
            <li class="dropdown-header">
              You have new notifications
              <a href="all_notifications.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <?php 

            while($noti_row = mysqli_fetch_assoc($inst_noti_query)){
              $message = $noti_row["message"];

            ?>
            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Instructor</h4>
                <p><a href="all_notifications.php"><?php echo $message ?></a></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
              <?php }?>
              <?php
              while($admin_noti_row = mysqli_fetch_assoc($admin_noti_query)){
              $message1 = $admin_noti_row["message"];

            ?>
            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Administrator</h4>
                <p><a href="all_notifications.php"><?php echo $message1 ?></a></p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
              <?php }?>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="all_notifications.php">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $username?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fname ?> <?php echo $lname ?></h6>
              <span><?php echo $dep_name ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">EXAMS</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-fill"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="exam_category.php">
              <i class="bi bi-circle"></i><span>Mock Exams</span>
            </a>
          </li>
          <li>
            <a href="course_specific_exam_select.php">
              <i class="bi bi-circle"></i><span>Course Specific Exams</span>
            </a>
          </li>
          <li>
            <a href="exit_exam_select.php">
              <i class="bi bi-circle"></i><span>Exit Exams</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-heading">STUDY MATERIALS</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="study_materials.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Study Materials</span>
        </a>
      </li><!-- End study materials Page Nav -->

      <li class="nav-heading">Others</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="all_results.php">
          <i class="bi bi-card-checklist"></i>
          <span>Results</span>
        </a>
      </li><!-- End results Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li><!-- End profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="contact.php">
          <i class="bi bi-person-lines-fill"></i>
          <span>Contact</span>
        </a>
      </li><!-- End contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-left"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
           
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Profile</h3></div>
                    <div class="card-body">
                        <form action="" method="POST"><br>
                        <div class="form-group row">
                                <label for="firstname" class="col-md-2 col-form-label text-md-right">First Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="firstname" class="form-control" name="firstname" value="<?php echo $firstname?>" required autofocus><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-2 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="lastname" class="form-control" name="lastname" value="<?php echo $lastname?>" required autofocus><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-2 col-form-label text-md-right">User Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="username" class="form-control" name="username" value="<?php echo $username?>" required autofocus><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department" class="col-md-2 col-form-label text-md-right">Department</label>
                                <div class="col-md-8">
                                <select class="form-select" name="department" required>
                                        <?php 
                                            $query2 = "select * from department";
                                            $result2 = mysqli_query($connect,$query2);

                                            while($row = mysqli_fetch_assoc($result2)){
                                                
                                                $depID = $row['dep_ID'];
                                                $dep_name = $row['department'];
                                        ?>
                                        <option value=""disabled selected hidden>Please Choose...</option>
                                        <option value="<?php echo ($depID)?>"> <?php echo ($depID);?>. <?php echo ($dep_name)?></option>
                                        <?php
                                            }
                                        ?>
                                        </select><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-2 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-8">
                                <h6><?php echo $email?></h6><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>
                                <div class="col-md-8">
                                    <h6>********** 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact" class="col-md-2 col-form-label text-md-right">Contact</label>
                                <div class="col-md-8">
                                    <input type="text" id="contact" class="form-control" name="contact" value="<?php echo $contact?>" required autofocus><br>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-5">
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      
    </div>
    <div class="credits">
    </div>
  </footer ><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  
  <script src="assets/js/main.js"></script>

</body>

</html>