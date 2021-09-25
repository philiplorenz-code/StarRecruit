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
               $query = "update nachrichten set stadt='$stadt',softskills='$softskills',hardskills='$hardskills',sprachen='$sprachen',gehalt='$gehalt',sprachen='$sprachen',wochenstunden='$wochenstunden',recruiter_id='$recruiterid;";
       
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


         <hgroup>
  <h1>Material Design Form</h1>
  <h3>By Josh Adamous</h3>
</hgroup>
<form>
  <div class="group">
    <input type="text"><span class="highlight"></span><span class="bar"></span>
    <label>Name</label>
  </div>
  <div class="group">
    <input type="email"><span class="highlight"></span><span class="bar"></span>
    <label>Email</label>
  </div>
  <button type="button" class="button buttonBlue">Subscribe
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
</form>
<footer><a href="http://www.polymer-project.org/" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>
  <p>You Gotta Love <a href="http://www.polymer-project.org/" target="_blank">Google</a></p>
</footer>





        </div>
    </div>

      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/theme.js"></script>
   </body>
</html>