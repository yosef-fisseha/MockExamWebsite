<?php
 require("session.php");
$date = date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minuits"));

 require_once("connect/connection.php");
 require_once("question_num_selector.php");


$query = mysqli_query($connect,"SELECT `tbl_name` FROM `questions` WHERE dep_ID = $dep_ID");
$row = mysqli_fetch_assoc($query);
$que_tbl_name = $row['tbl_name'];

$courseID = $_SESSION["courseID"];

$query2 = mysqli_query($connect,"SELECT `coursename` FROM `course` WHERE courseID  = $courseID ");
$row2 = mysqli_fetch_assoc($query2);
$coursename = $row2['coursename'];

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
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
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
              <a class="dropdown-item d-flex align-items-center" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/contact.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/logout.php">
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
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/home.php">
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
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/exam_category.php">
              <i class="bi bi-circle"></i><span>Mock Exams</span>
            </a>
          </li>
          <li>
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/course_specific_exam_select.php">
              <i class="bi bi-circle"></i><span>Course Specific Exams</span>
            </a>
          </li>
          <li>
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/exit_exam_select.php">
              <i class="bi bi-circle"></i><span>Model Exams</span>
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
        <a class="nav-link collapsed" href="pages-faq.html">
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
          <li class="breadcrumb-item active">results</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="maincontent">
        <?php 
        
        $correct = 0;
        $wrong = 0;
        
        if(isset($_SESSION["answer"]))
        {
            for($i=0;$i<$que_num_size;$i++){
                $answer="";
                $query=mysqli_query($connect,"SELECT * FROM `$que_tbl_name` where `courseID` = $_SESSION[courseID] && questionID = $que_num[$i]");
                while($row=mysqli_fetch_array($query)){

                    $answer = $row['correct_ans'];
                }
                if(isset($_SESSION["answer"][$i]))
                {
                    if($answer == $_SESSION["answer"][$i])
                    {
                        $correct=$correct+1;
                    }
                    else{
                        $wrong = $wrong+1;
                    }
                }
                else{
                    $wrong=$wrong+1;
                }
            }
        }

        ?>
        <div class="card">
            <div class="card-body"><br>        
        <?php
        $query1=mysqli_query($connect,"SELECT * FROM `$que_tbl_name` where `courseID` = $_SESSION[courseID]");
        $count=mysqli_num_rows($query1);
        $wrong = $count-$correct;
        ?>
        <style>
          td{
            font-size: larger;
            font-weight: bolder;
          }
        </style>
        <table class="table text-center">
                <thead>
                  <tr>
                    <th></th>
                    <th scope="col" style="font-size: xx-large;" >Score</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                  Total Questions: <?php echo $count?>
                  </td>
                  <td>
                  Correct Answers: <?php echo $correct?>
                  </t>
                  <td>
                  Wrong Answers: <?php echo $wrong?>
                  </td>
                  
                </tbody>
              </table>

        <input type="button" class="btn btn-success" value="GO Back to Home" onclick="location.href = 'http:/MockExamWebsit/SystemUser/home.php';">
        <?php
        echo "</center>";
        ?>
        </div>
        </div>
    </div>
     <?php
     if(isset($_SESSION["exam_start"]))
     {
        #$date = date("Y-m-d");
        mysqli_query($connect,"INSERT INTO `result`(`ID`, `user_name`, `dep_ID`, `category`, `exam_level`, `total_questions`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES ('','$username','$dep_ID','Course specific Exam for($coursename)','-','$count','$correct','$wrong','$date')");
     }
     
     
if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);
      
    ?>
    <script type="text/javascript ">
        window.location.href=window.location.href;
    </script>
    <?php
}
     ?>
     <br><br>
<h1 style="text-align: center;" >ANSWERS</h1>


        <?php 
        
        $query = mysqli_query($connect,"SELECT * FROM `$que_tbl_name` where `courseID` = $_SESSION[courseID]");
        $q_num = 1;
        while($row1 = mysqli_fetch_assoc($query))
        {
          $question = $row1['question'];
          $option_a = $row1['option_a'];
          $option_b = $row1['option_b'];
          $option_c = $row1['option_c'];
          $option_d = $row1['option_d'];
          $correct_ans = $row1['correct_ans'];
          $answer_description = $row1['answer_description'];
          ?>
<div class="row my-4">
  <div class="col-lg-10 col-12">
      <div class="custom-block bg-white" style="min-height: 300px;">
        <div style="margin-left: 40px;" ><br><br>
          <h5>(<?php echo $q_num?>)<?php if (strpos($question,'question_images/') !== false) {
                    ?>
                    <img src="<?php echo $question; ?>">
                        <?php
                }else{
                    echo $question;
                }?></h5>
          <h5>A. <?php echo $option_a?></h5>
          <h5>B. <?php echo $option_b?></h5>
          <h5>C. <?php echo $option_c?></h5>
          <h5>D. <?php echo $option_d?></h5>
          _______________________________________________________
          <h5 <?php if(isset($_SESSION["answer"][$q_num -1])){if($_SESSION["answer"][$q_num -1] == $correct_ans){?> style="color:green !important;" <?php }else{?> style="color:red;" <?php } }?> >Your Answer: <?php if(isset($_SESSION["answer"][$q_num -1])){ echo $_SESSION["answer"][$q_num - 1];}else{echo "  ";} ?></h5>
          <h5>correct answer: <?php echo $correct_ans?></h5>
          <h5>Answer Description:<?php echo $answer_description?></h5><br><br> 
          </div>
      </div>
  </div>
</div>
<?php
        $q_num++;
        }
        ?> 
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
