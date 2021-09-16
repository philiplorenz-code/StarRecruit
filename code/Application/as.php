<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //sth was posted
        $user_id = $user_data["user_id"];
        $vorname = $_POST['vorname'];
        $name = $_POST['name'];
        $wohnort = $_POST['wohnort'];
        $user_alter = $_POST['user_alter'];
        $beschreibung = $_POST['beschreibung'];
        $sprachen = $_POST['sprachen'] . ",";
        $softskills = $_POST['softskills'] . ",";
        $hardskills = $_POST['hardskills'] . ",";
        $mind_gehalt = $_POST['mind_gehalt'];
        $beruf = $_POST['beruf'];

        // save to db
        $query = "update users set vorname='$vorname',name='$name',wohnort='$wohnort',user_alter='$user_alter',beschreibung='$beschreibung',sprachen='$sprachen',softskills='$softskills',hardskills='$hardskills',mind_gehalt='$mind_gehalt',beruf='$beruf' where user_id='$user_id';";
        echo $beschreibung;
        echo $_POST['beschreibung'];
        echo $query;
        mysqli_query($con, $query);

    }




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
                    <div class="sidebar-brand-text mx-3"><span>StarRecruitment</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="table.html"><i class="fas fa-table"></i><span>Profil Bearbeiten</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
    <div class="container">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                    </div>
                    <h5 class="user-name">Philip Lorenz</h5>
                    <h6 class="user-email">philip@learning-it.io</h6>
                </div>
                <div class="about">
                    <h5>About</h5>
                    <p>BlaBlaBla</p>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <form method="post">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Persönlich</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="vorname">Vorname</label>
                        <input type="text" class="form-control" name="vorname" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="name">Nachname</label>
                        <input type="text" class="form-control" name="name" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="wohnort">Wohnort</label>
                        <input type="text" class="form-control" name="wohnort" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="user_alter">Alter</label>
                        <input type="text" class="form-control" name="user_alter" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="beschreibung">Beschreibung</label>
                        <input type="text" class="form-control" name="beschreibung" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Fähigkeiten (getrennt durch +)</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="sprachen">Sprachen</label>
                        <input type="text" class="form-control" name="sprachen" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="softskills">Softskills</label>
                        <input type="text" class="form-control" name="softskills" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="hardskills">Hardskills</label>
                        <input type="text" class="form-control" name="hardskills" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Beruf</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="mind_gehalt">Gewünschtes Jahresgehalt</label>
                        <input type="text" class="form-control" name="mind_gehalt" placeholder="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="beruf">Beruf</label>
                        <input type="text" class="form-control" name="beruf" placeholder="">
                    </div>
                </div>
            </div>
            HIER NOCH FOLGENDE UPLOADS: CV, Profilbild, Zeugnisse/Zertifikate
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                    <button class="btn btn-info mt-2" type="submit" style="background: #9c3f2a;">Update</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>


    
    </div>

            <div></div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>