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
    echo $num_rows;


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
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/editprofilean.php"><i class="fas fa-table"></i><span>Profil Bearbeiten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachan.php"><i class="fas fa-table"></i><span>Postfach</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="p-5 mb-4 bg-light round-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Hallo <?php echo $entry['vorname']; ?>!</h1>
                    <p class="col-md-8 fs-4">"Meaning is something you build into your life. You build it out of your own past, out of your affections and loyalties, out of the experience of humankind as it is passed on to you... You are the only one who can put them together into that unique pattern that will be your life."</p>
                    <h1>Du hast X neue Nachrichten!</h1><a class="btn btn-primary btn-lg" role="button" href="#">Zum Postfach</a>
                </div>
            </div>
            <div class="p-5 mb-4 bg-light round-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">News-Feed</h1>
                    <h1>HIER DER FEED</h1>
                </div>
            </div>
        </div>
        </div>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


