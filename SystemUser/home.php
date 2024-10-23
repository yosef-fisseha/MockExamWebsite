<?php
 require("session.php");
 require_once("connect/connection.php");

  $query =mysqli_query($connect,"SELECT * FROM `result` WHERE `user_name` = '$username'");
  $result = mysqli_num_rows($query);
  $pass = 0;
  $fail = 0;
  while($row = mysqli_fetch_assoc($query)){

    $total = $row['total_questions'];
    $correct = $row['correct_answer'];
    if($total/2 <= $correct){
      $pass++;    
    }else
    {
      $fail++;
    }
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
        <a class="nav-link " href="home.php">
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
        <a class="nav-link collapsed" href="profile.php">
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
    <div class="maincontent">
        <style>
          i,h6{
            font-size: xx-large;
            font-weight: bolder;
          }
        </style>
    <div class="row">

            <!-- total result Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body bg-primary text-white" style="border-radius: 15px;">
                  <h5 class="card-title text-white">Exams Taken</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-earmark"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $result?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End total result Card -->

            <!-- passed result Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body bg-success text-white" style="border-radius: 15px;">
                  <h5 class="card-title text-white">Passed Exams</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-check2" style="font-size: larger;" ></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pass ?></h6>
                      </div>
                  </div>
                </div>

              </div>
            </div><!-- End passed result Card -->

            <!-- faild result Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body bg-danger text-white" style="border-radius: 15px;">
                  <h5 class="card-title text-white">Failed Exams</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-x-lg"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $fail?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End faild result Card -->


            

            <!-- Top results -->
            <div class="col-12">
              <div class="card top-selling overflow-auto" style="border-radius: 25px;">
                <div class="card-body pb-0">
                  <h5 class="card-title  ">Results</h5>

                  <table class="table">
                    <thead>
                      <tr>
                        <th>Category</th>
                        <th>Exam Level</th>
                        <th>Total Questions</th>
                        <th>Correct Answers</th>
                        <th>Wrong Answers</th>
                        <th>Exam Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                               $query1 =mysqli_query($connect,"SELECT * FROM `result` WHERE `user_name` = '$username' ORDER BY ID DESC LIMIT 10"); 
                                while($row1 = mysqli_fetch_assoc($query1))
                                {
                                
                                    $username = $row1['user_name'];
                                    $category = $row1['category'];
                                    $exam_level = $row1['exam_level'];
                                    $total_questions = $row1['total_questions'];
                                    $correct_answer = $row1['correct_answer'];
                                    $wrong_answer = $row1['wrong_answer'];
                                    $exam_time =$row1['exam_time'];
                        ?>
                                <td><?php echo $username  ?></td>
                                <td><?php echo $category ?></td>
                                <td><?php echo $exam_level ?></td>
                                <td><?php echo $total_questions ?></td>
                                <td><?php echo $correct_answer ?></td>
                                <td><?php echo $wrong_answer ?></td>
                                <td><?php echo $exam_time ?></td>       
                      </tr>
                    </tbody>
                    <?php
                                }
                    ?>
                  </table>

                </div>

              </div>
            </div><!-- End results -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card" style="border-radius: 15px;">

                <div class="card-body">
                  <h5 class="card-title" style="font-size: xx-large; font-weight: bolder " >Avalable Courses materials</h5>
                    <hr>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    
                    </div>
                    <div class="ps-3">
                      <ul>
                      <?php
                               $query2 =mysqli_query($connect,"SELECT coursename FROM `$dep_name study materials` INNER JOIN course ON `$dep_name study materials`.`courseID` = course.courseID WHERE `$dep_name study materials`.`dep_ID` = $dep_ID"); 
                               if($cm_count = mysqli_num_rows($query2) > 0){ 
                               while($row2 = mysqli_fetch_assoc($query2))
                                {
                                    $coursename = $row2['coursename'];
                        ?>
                                <li><h5 style="font-weight: bolder;" ><?php echo $coursename  ?></h5></li>
                                       
                     
                    <?php
                                }
                              }else{
                                echo "no record found";
                              }
                    ?>
                  </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End course Card -->

            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card" style="border-radius: 15px;">

                <div class="card-body">
                  <h5 class="card-title" style="font-size: xx-large; font-weight: bolder " >Mock Exams</h5>
                    <hr>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    
                    </div>
                    <div class="ps-3">
                      <ul>
                      <?php
                               $query3 =mysqli_query($connect,"SELECT * FROM `exam_category` WHERE department = 'all' OR department = '$dep_name'"); 
                                while($row3 = mysqli_fetch_assoc($query3))
                                {
                                
                                    $exam_level = $row3['exam_level'];
                        ?>
                                <li><h5 style="font-weight: bolder;" ><a href="exam_category.php"><?php echo $exam_level  ?></a></h5></li>
                                       
                     
                    <?php
                                }
                    ?>
                  </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End total result Card -->
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