<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //sth was posted
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_acctype = $_POST['user_acctype'];

        if(!empty($user_email) && !empty($user_password) && !is_numeric($user_email)){
            // save to db
            $query = "insert into users (user_email,user_password,user_acctype) values ('$user_email','$user_password','$user_acctype');";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else {
            echo "Please enter valid information!!!";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="assets/css/Login-Red.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>



<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h1 style="text-align: center;color: #9c3f2a;"><i class="fa fa-lightbulb-o"></i>&nbsp;StarRecruitment</h1>
                    <form method="post">
                        <div class="form-group mb-3"><label class="form-label text-secondary">Email</label>
                        <input class="form-control" type="text" name="user_email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                        <div class="form-group mb-3"><label class="form-label text-secondary">Password</label>
                        <input class="form-control" type="password" name="user_password" required=""></div>
                        <div class="form-group mb-3"><label class="form-label text-secondary">Account Type</label>
                        <select name="user_acctype">
                            <option>Recruiter</option>
                            <option>Arbeitssuchender</option>
                        </select>
                        </div>
                        <button class="btn btn-info mt-2" type="submit" style="background: #9c3f2a;">SignUp</button>

                    </form><a href="login.php" style="text-align: right;">Already having an account? Click here to Login!</a>
                    <p class="mt-3 mb-0"></p>
                </div>

                
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;assets/img/business.jpg&quot;);background-size:cover;background-position:center center;">
                <p class="ms-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a class="text-dark" href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank"><em>Aldain Austria</em></a><br></p>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>