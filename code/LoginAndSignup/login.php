<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //sth was posted
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(!empty($user_email) && !empty($user_password) && !is_numeric($user_email)){
            // read to db
            $query = "select * from users where user_email = '$user_email' limit 1;";
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['user_password'] === $user_password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }

            echo "Wrong username or password!";
        
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
    <title>Login</title>
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
                        <div class="form-group mb-3"><label class="form-label text-secondary">Email</label><input class="form-control" type="text" name="user_email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                        <div class="form-group mb-3"><label class="form-label text-secondary">Password</label><input class="form-control" type="password" name="user_password" required=""></div><button class="btn btn-info mt-2" type="submit" style="background: #9c3f2a;">Log In</button>
                    </form><a href="signup.php" style="text-align: right;">Not having an account? Click here to Sign-Up!</a>
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