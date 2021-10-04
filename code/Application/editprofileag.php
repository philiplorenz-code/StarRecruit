<?php
   session_start();
   
       include("connection.php");
       include("functions.php");
       
       $user_data = check_login($con);
       $user_id = $user_data["user_id"];
   
   
   
           // Post der Form
           if($_SERVER['REQUEST_METHOD'] == "POST"){
            //sth was posted
            $user_id = $user_data["user_id"];
            $unternehmensname = $_POST['unternehmensname'];
            $mitarbeiteranzahl = $_POST['mitarbeiteranzahl'];
            $branche = $_POST['branche'];
            $website = $_POST['website'];
            $verantwortlicher = $_POST['verantwortlicher'];
    
            // save to db
            $query = "update users set unternehmensname='$unternehmensname',mitarbeiteranzahl='$mitarbeiteranzahl',branche='$branche',website='$website',verantwortlicher='$verantwortlicher' where user_id='$user_id';";

            // echo $query;
            mysqli_query($con, $query);


            // exec("php matching_algo.php");

    
        }
   
           $query = "select * from users where user_id='$user_id';";

           $result = mysqli_query($con, $query);
           $entry = $result->fetch_assoc();
           //var_dump($entry);
           //echo $entry['user_email'];

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
                                 <h6 class="mb-2 text-primary">Unternehmensinfos</h6>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="unternehmensname">Unternehmensname</label>
                                    <input type="text" class="form-control" name="unternehmensname" value='<?php echo $entry['unternehmensname'];?>'>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="mitarbeiteranzahl">Mitarbeiteranzahl</label>
                                    <input type="text" class="form-control" name="mitarbeiteranzahl" value='<?php echo $entry['mitarbeiteranzahl'];?>'>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="branche">Branche</label>
                                    <input type="text" class="form-control" name="branche" value='<?php echo $entry['branche'];?>'>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="website">Link zur Website</label>
                                    <input type="text" class="form-control" name="website" value='<?php echo $entry['website'];?>'>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                 <div class="form-group">
                                    <label for="verantwortlicher">Verantwortlicher</label>
                                    <input type="text" class="form-control" name="verantwortlicher" value='<?php echo $entry['verantwortlicher'];?>'>
                                 </div>
                              </div>
                           </div>
                           <div class="row gutters">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                 <div class="text-right">
                                    <button class="btn btn-info mt-2" type="submit" style="background: #9c3f2a;">Update</button>
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