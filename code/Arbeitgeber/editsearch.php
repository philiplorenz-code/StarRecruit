<?php
   session_start();

       $search_id = $_GET['data'];
   
       include("connection.php");
       include("functions.php");
       
       $user_data = check_login($con);
       $user_id = $user_data["user_id"];

       $query = "select * from search where recruiter_id='$user_id';";
       $result = mysqli_query($con, $query);
       $entry = $result->fetch_assoc();
   
   
   
           // Post der Form
           if($_SERVER['REQUEST_METHOD'] == "POST"){
               //sth was posted
               $name = $_POST['name'];
               $stadt = $_POST['stadt'];
               $softskills = $_POST['softskills'];
               $hardskills = $_POST['hardskills'];
               $sprachen = $_POST['sprachen'];
               $gehalt = $_POST['gehalt'];
               $wochenstunden = $_POST['wochenstunden'];
               $recruiterid = $user_id;
       
               // save to db
               $query = "UPDATE search SET name='$name',stadt='$stadt',softskills='$softskills',hardskills='$hardskills',sprachen='$sprachen',max_gehalt='$gehalt',wochenstunden='$wochenstunden',recruiter_id='$recruiterid' WHERE id='$search_id';";

            
               // echo $query;
               mysqli_query($con, $query);
               exec("php matching_algo.php");

               header("Location: editsearches.php");
               die;
       
           }
   
   ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxs-bulb bx-md'></i>
      <span class="logo_name">StarRecruitment</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="./home.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Account-Start</span>
          </a>
        </li>
        <li>
          <a href="./editsearches.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Suchen Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./profile.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Profil Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./postfachag.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Postfach</span>
          </a>
        </li>
        <li>
          <a href="./settings.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Einstellungen</span>
          </a>
        </li>
        <li class="log_out">
          <a href="/ApplicationLogic/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Suche bearbeiten</span>
      </div>


    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales100 box">
          
          <div class="fcf-body">

            <div id="fcf-form">
        
            <form id="fcf-form-id" class="fcf-form-class" method="post">
                
                <div class="fcf-form-group">
                    <label for="Name" class="fcf-label">Name der Suche</label>
                    <div class="fcf-input-group">
                        <input type="text" required class="fcf-form-control" name="name" value='<?php echo $entry['name'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Email" class="fcf-label">Hardskills (komma-getrennt)</label>
                    <div class="fcf-input-group">
                        <input type="text" class="fcf-form-control" name="hardskills" value='<?php echo $entry['hardskills'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Message" class="fcf-label">Softskills (komma-getrennt)</label>
                    <div class="fcf-input-group">
                      <input type="text" class="fcf-form-control" name="softskills" value='<?php echo $entry['softskills'];?>'>
                    </div>
                </div>

                <div class="fcf-form-group">
                  <label for="Message" class="fcf-label">Sprachen</label>
                  <div class="fcf-input-group">
                      <input type="text" class="fcf-form-control" name="sprachen" value='<?php echo $entry['sprachen'];?>'>
                  </div>
              </div>

              <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Stadt</label>
                <div class="fcf-input-group">
                    <input type="text" class="fcf-form-control" name="stadt" value='<?php echo $entry['stadt'];?>'>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Max. Gehalt</label>
                <div class="fcf-input-group">
                    <input type="text" class="fcf-form-control" name="gehalt" value='<?php echo $entry['gehalt'];?>'>

                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Wochenstunden</label>
                <div class="fcf-input-group">
                    <input type="text" class="fcf-form-control" name="wochenstunden" value='<?php echo $entry['wochenstunden'];?>'>

                </div>
            </div>
        
                <div class="fcf-form-group">
                    <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Update</button>
                </div>
        
        
            </form>
            </div>
        
        </div>
        




          
        </div>
      </div>

    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
