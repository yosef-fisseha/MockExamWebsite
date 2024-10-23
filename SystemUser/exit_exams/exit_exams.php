<?php
 require("session.php");
 require("question_num_selector.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Exit Exam</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/sty.css" rel="stylesheet">

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
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">EXAMS</li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-pencil-fill"></i><span>Exams</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/select_category.php">
              <i class="bi bi-circle" ></i><span>Mock Exams</span>
            </a>
          </li>
          <li>
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/course_specific_exam_select.php" >
              <i class="bi bi-circle"></i><span>Course Specific Exams</span>
            </a>
          </li>
          <li>
            <a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/exit_exam_select.php" class="active">
              <i class="bi bi-circle"></i><span>Model Exams</span>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-heading">STUDY MATERIALS</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/study_materials.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Study Materials</span>
        </a>
      </li><!-- End study materials Page Nav -->

      <li class="nav-heading">Others</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/all_results.php">
          <i class="bi bi-card-checklist"></i>
          <span>Results</span>
        </a>
      </li><!-- End results Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/profile.php">
          <i class="bi bi-person-circle"></i>
          <span>Profile</span>
        </a>
      </li><!-- End profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/contact.php">
          <i class="bi bi-person-lines-fill"></i>
          <span>Contact</span>
        </a>
      </li><!-- End contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/logout.php">
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
          <li class="breadcrumb-item"><a href="http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/index.html">Home</a></li>
          <li class="breadcrumb-item active">exit exam</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
        <ul class="breadcome-menu" style="float:inline-end; background-color:white;">
            <li><div id="countdowntimer" style="display: block; font-size:larger; ">
            <script type="text/javascript">
                    setInterval(function(){
                        timer();
                    },1000)
                function timer()
                {
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function () {
                        if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
                            if(xmlhttp.responseText=="00:00:01")
                            {
                                window.location="result.php";
                            }
                        document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
                        }
                    
                    };
                    xmlhttp.open("GET", "load_timer.php?", true);
                    xmlhttp.send(null);
                }
            </script>
            </div>
        </li>
        </ul>
        <br>
    </div>
    

<!-- exam stsrts here-->
<div class="maincontent">


<div class="row my-4">
  <div class="col-lg-10 col-10">
    <div class="custom-block bg-white">
    <div id="total_que" style="float: right"><p>0</p></div>
      <div style="float: right"><P>/</P></div>
      <div id="current_que" style="float: right"><p><script type="text/javascript"> console.log(num); </script></p></div>
        <br>
        <div class="row" style="margin-top: 30px; margin: 10px; ">
          <div class="row">
            <div class="col-lg-12 col-lg-push-3" style="min-height: 250px; background-color: white" id="load_questions">
            </div>
          </div>
        </div>
      <div class="row" style="margin-top: 10px">
    <div class="col-lg-10 col-lg-push-3" style="min-height: 50px;">
      <div class="col-lg-12 text-center">
        <input type="button" class="btn btn-warning" value="< Prevous Question" onclick="load_previous();">&nbsp;
        <input type="button" class="btn btn-success" value="Next Question >" onclick="load_next();">
      </div>
      <input style="float: right;" type="button" class="btn btn-danger" value="Submit" onclick="exit_exam();">
    </div>
      </div>
  </div>
</div>
</div>

<!-- exam ends here-->
<script type="text/javascript">
  num = 0;
  function load_total_que()
  {
    var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "load_total_que.php", true);
        xmlhttp.send(null);
  }
  
var questionno = que_num[num];

load_questions(questionno);

function load_questions(questionno)
{
  document.getElementById("current_que").innerHTML=num + 1;
  var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText=="over")
                {
                  window.location="result.php";
                }
                else
                {
                  document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                  load_total_que();
                }
            }
        };
        xmlhttp.open("GET", "load_questions.php?questionno="+ questionno+"&que_num="+ num, true);
        xmlhttp.send(null);
}

function radioclick(radiovalue,questionno)
{
  var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
          
        }
    };
    xmlhttp.open("GET", "save_ans_in_session.php?questionno="+ num +"&value1="+radiovalue , true);
    xmlhttp.send(null);
}

function load_previous()
{
  if(num <= 0)
  {
    load_questions(questionno);
  }
  else
  { 
    --num;
    questionno = que_num[num];
    load_questions(questionno);
  }
}

function load_next()
{
  if(num >= que_num_size)
  {
    questionno;
  }
  else{
    ++num;
    questionno = que_num[num];
    load_questions(questionno);
  }
}

function exit_exam()
{
  var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState== 4 && xmlhttp.status == 200) {
              if(window.confirm("ATTENTION: By accepting this request you are submiting your answers and exiting the exam room. are you sure you want to exit??")) {
                  window.location="result.php"
                }else
                {
                  document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                  load_total_que();
                }
            }
        };
        xmlhttp.open("GET", "load_questions.php?questionno="+ questionno+"&que_num="+ num, true);
        xmlhttp.send(null);
}


</script>
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
