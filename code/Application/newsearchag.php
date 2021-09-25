<?php
   session_start();
   
       include("connection.php");
       include("functions.php");
       
       $user_data = check_login($con);
       $user_id = $user_data["user_id"];
   
   
   
           // Post der Form
           if($_SERVER['REQUEST_METHOD'] == "POST"){
               //sth was posted
               $stadt = $_POST['stadt'];
               $softskills = $_POST['softskills'] . ",";
               $hardskills = $_POST['hardskills'] . ",";
               $sprachen = $_POST['sprachen'] . ",";
               $gehalt = $_POST['gehalt'];
               $wochenstunden = $_POST['wochenstunden'];
               $recruiterid = $user_id;
       
               // save to db
               $query = "update nachrichten set stadt='$stadt',softskills='$softskills',hardskills='$hardskills',sprachen='$sprachen',gehalt='$gehalt',sprachen='$sprachen',wochenstunden='$wochenstunden',recruiter_id='$recruiterid';";
                echo $query;
               // echo $query;
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
            <div class="container-fluid d-flex flex-column p-0">
               <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                  <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-lightbulb"></i></div>
                  <div class="sidebar-brand-text mx-3"><span>SR</span></div>
               </a>
               <hr class="sidebar-divider my-0">
               <ul class="navbar-nav text-light" id="accordionSidebar">
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
                  <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/homean.php"><i class="fas fa-table"></i><span>Home</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/editprofilean.php"><i class="fas fa-table"></i><span>Profil Bearbeiten</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachan.php"><i class="fas fa-table"></i><span>Postfach</span></a></li>
                  <li class="nav-item"></li>
                  <li class="nav-item"></li>
               </ul>
            </div>
         </nav>
         <div class="container">

            <div class="row gutters">
               <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="card h-100">
                     <div class="card-body">
                     <h1>Neue Suche </h1>
                        <form method="post">
                           <div class="row gutters">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <h6 class="mb-2 text-primary">Fähigkeiten (komma-getrennt)</h6>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="vorname">Hardskills</label>
                                    <input type="text" class="form-control" name="hardskills">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="name">Softskills</label>
                                    <input type="text" class="form-control" name="softskills">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="wohnort">Sprachen</label>
                                    <input type="text" class="form-control" name="sprachen">
                                 </div>
                              </div>
                           </div>
                           <div class="row gutters">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <h6 class="mt-3 mb-2 text-primary">Allgemein</h6>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="sprachen">Stadt</label>
                                    <input type="text" class="form-control" name="stadt">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="softskills">Max. Gehalt</label>
                                    <input type="text" class="form-control" name="gehalt">
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="hardskills">Wochenstunden</label>
                                    <input type="text" class="form-control" name="wochenstunden">
                                 </div>
                              </div>
                           </div>
                           <div class="row gutters">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="text-right">
                                    <button class="btn btn-info mt-2" type="submit" style="background: #9c3f2a;">Suche starten</button>
                                 </div>
                              </div>
                           </div>
                     </div>
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