<?php
    session_start();
    include('connect/connection.php');

    $server_ip = gethostbyname(gethostname());

    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($connect, trim($_POST['email']));
        $password = trim($_POST['password']);

        $sql = mysqli_query($connect, "SELECT * FROM system_user where email = '$email'");
        $count = mysqli_num_rows($sql);

        if($count > 0){
            $fetch = mysqli_fetch_assoc($sql);
            $hashpassword = $fetch["password"];
            $dep_ID = $fetch["dep_ID"];
            $fname = $fetch["firstname"];
            $lname = $fetch["lastname"];
            $username = $fetch["username"];
            
            
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['dep_ID'] = $dep_ID;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            
            if($fetch["status"] == 0){
                ?>
                <script>
                    alert("Please verify email account before login.");
                </script>
                <?php
            }else if(password_verify($password, $hashpassword)){
                ?>
                <script>
                    alert("WELCOME <?php echo $username ?>!");
                    window.location = "http://<?php echo $server_ip ?>/MockExamWebsit/SystemUser/home.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("email or password invalid, please try again.");
                </script>
                <?php
            }
        }
            
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login Form</title>
</head>
<style>
    body{
        background: url(loginbg1.png);
        background-size:100% 100%;
    }
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #94cff7;" >
    <div class="container">
        <a class="navbar-brand" style="font-size:x-large; font-weight:bolder" href="#">User Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://<?php echo $server_ip?>/MockExamWebsit/SystemAdmin/admin_login/index.php" style="font-weight:bold; color:black; text-decoration:underline">Administrator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://<?php echo $server_ip?>/MockExamWebsit/instructor/instructor_login/index.php" style="font-weight:bold; color:black; text-decoration:underline">Instractor</a>
                </li>
                <li class="nav-item">
                    
                </li>
            </ul>

        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer" style="margin-top: 100px;" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #94cff7;"><h1 class="text-center" style="font-weight: bolder; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Mock Exam Platform</h1></div>
                    <div class="card-body" style="background-color: #c6e6fc;" >
                        <form action="" method="POST" name="login">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Login" name="login">
                                <a href="recover_psw.php" class="btn btn-link">
                                    Forgot Your Password?
                                </a><br>
                                <a class="nav-link" href="register.php" style="float: right;" >Register</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
