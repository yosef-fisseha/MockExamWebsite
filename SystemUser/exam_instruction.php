<?php
 require("session.php");
 require_once("connect/connection.php");
 unset($_SESSION["answer"]);

 $level_ID = $_GET['level_ID'];

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
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-fill"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="exam_category.php" class=" active">
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

  <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="card-header"><h3>Exam Instructions</h3></div>
                    <div class="card-body">

                        <div class="instructions">
                            <h4>1. System Requirements:</h4>
                            <ul>
                                <li><strong>Browser:</strong> Use [insert supported browsers, e.g., Google Chrome, Mozilla Firefox, Safari]. Ensure your browser is up-to-date.</li>
                                <li><strong>Internet Connection:</strong> A stable connection is required. Avoid using public or unstable networks.</li>
                                <li><strong>Device:</strong> Ensure your device (computer, tablet, etc.) is functioning properly and has enough battery or is plugged in.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>2. Preparation:</h4>
                            <ul>
                                <li><strong>Environment:</strong> Choose a quiet, distraction-free environment. Ensure you have good lighting and that your workspace is clean.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>3. Starting the Exam:</h4>
                            <h5>Starting Procedures:</h5>
                            <ul>
                                <li><strong>Exam Access:</strong> Click the “Start Exam” button to begin.</li>
                                <li><strong>Read Instructions:</strong> Carefully read the exam instructions and any provided guidelines before starting.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>4. During the Exam:</h4>
                            <ul>
                                <li><strong>Time Management:</strong> Monitor your time using the on-screen timer. Make sure to manage your time according to the exam duration.</li>
                                <li><strong>Answering Questions:</strong> <ul>
                                    <li>Multiple-Choice: Select your answer by clicking on the option.</li>
                                </ul></li>
                                <li><strong>Navigating:</strong> Use the provided navigation tools to move between questions or sections.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>5. Technical Issues:</h4>
                            <ul>
                                <li><strong>Avoid Refreshing:</strong> Do not refresh the page or close your browser during the exam.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>6. Completing the Exam:</h4>
                            <h5>Review and Submit:</h5>
                            <ul>
                                <li><strong>Final Review:</strong> Once you have answered all questions, review your answers if time permits.</li>
                                <li><strong>Submit:</strong> Click the “Submit Exam” button to finalize your responses.</li>
                            </ul>
                        </div>
                        
                        <div class="instructions">
                            <h4>7. Post-Exam:</h4>
                            <ul>
                                <li><strong>Results:</strong> After submitting the exam, you will receive your result with all the answers and their descriptions.</li>
                                <li><strong>Review Results:</strong> Review scores to understand your performance and identify areas for improvement.</li>
                            </ul>
                        </div>
                        
                        <p class="note">Good luck! This exam is an opportunity to demonstrate your knowledge and skills. Stay focused, manage your time wisely, and do your best!</p>
                        <input type="button" class="btn btn-primary" value="Start Exam" name="<?php echo $level_ID ?>" onclick="set_exam_type_session(this.name)">
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

  <script type="text/javascript">
    function set_exam_type_session (exam_category)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function () {
            if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
                window.location = "mockexam.php";
            }
        };
        xmlhttp.open("GET", "set_exam_type_session.php?exam_category="+ exam_category, true);
        xmlhttp.send(null);
    }
</script>

</body>

</html>