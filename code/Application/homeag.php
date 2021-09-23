<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_id = $user_data["user_id"];

    // Get all messages to user
    $query = "select vorname from users where user_id='$user_id';";
    $result = mysqli_query($con, $query);
    $entry = $result->fetch_assoc();

    // Get count of messages
    $query = "select * from nachrichten where user_id='$user_id' and not status='accepted' and not status='denied';";
    $result = mysqli_query($con, $query);
    //var_dump($result);
    $num_rows = mysqli_fetch_row($result)[0];



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets_as/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets_as/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets_as/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets_as/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets_as/css/Account-setting-or-edit-profile.css">
    <link rel="stylesheet" href="assets_as/css/FORM.css">
    <link rel="stylesheet" href="assets_as/css/iframe.css">
    <link rel="stylesheet" href="assets_as/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="color: var(--bs-purple);background: #9c3f2a;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-lightbulb"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>SR</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/homeag.php"><i class="fas fa-table"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/sucheag.php"><i class="fas fa-table"></i><span>Suchen bearbeiten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/editprofileag.php"><i class="fas fa-table"></i><span>Profil Bearbeiten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachag.php"><i class="fas fa-table"></i><span>Postfach</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachag.php"><i class="fas fa-table"></i><span>Einstellungen</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachag.php"><i class="fas fa-table"></i><span>Logout</span></a></li>


                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <section></section>
            <div class="row register-form">
                <div class="col-md-8 offset-md-2">
                    <form class="custom-form">
                        <h1>Register Form</h1>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Name </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="email"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Password </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Repeat Password </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Dropdown </label></div>
                            <div class="col-sm-4 input-column">
                                <div class="dropdown"><button class="btn btn-light dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Dropdown </button>
                                    <div class="dropdown-menu"><a class="dropdown-item" href="#">First Item</a><a class="dropdown-item" href="#">Second Item</a><a class="dropdown-item" href="#">Third Item</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">I've read and accept the terms and conditions</label></div><button class="btn btn-light submit-button" type="button">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


