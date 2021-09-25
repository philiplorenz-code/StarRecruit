<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_id = $user_data["user_id"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets_search/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets_search/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets_search/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets_search/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets_search/css/Animated-Typing-With-Blinking.css">
    <link rel="stylesheet" href="assets_search/css/FPE-Gentella-form-elements-1.css">
    <link rel="stylesheet" href="assets_search/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="assets_search/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets_search/css/Pretty-Registration-Form.css">
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
                        <h1>Neue Suche</h1>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Stadt </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">HardSkills </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="email"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Softskills </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Gehalt (max) </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Gehalt (max) </label></div>
                            <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                        </div>
                        <button class="btn btn-light submit-button" type="button">Suche starten</button>
                    </form>
                </div>
            </div>
        </div>
        </div>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


