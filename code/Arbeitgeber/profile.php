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
          <a href="./profile.php" class="active">
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
        <span class="dashboard">Profil bearbeiten</span>
      </div>


    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales100 box">
          
          <div class="fcf-body">

            <div id="fcf-form">
        
            <form id="fcf-form-id" class="fcf-form-class" method="post">
                
                <div class="fcf-form-group">
                    <label for="Name" class="fcf-label">Unternehmensname</label>
                    <div class="fcf-input-group">
                        <input type="text" id="Name" class="fcf-form-control" name="unternehmensname" required value='<?php echo $entry['unternehmensname'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Name" class="fcf-label">Mitarbeiteranzahl</label>
                    <div class="fcf-input-group">
                        <input type="text" id="Name" class="fcf-form-control" name="mitarbeiteranzahl" required value='<?php echo $entry['mitarbeiteranzahl'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Message" class="fcf-label">Branche</label>
                    <div class="fcf-input-group">
                        <input id="text" class="fcf-form-control" rows="6" name="branche" required value='<?php echo $entry['branche'];?>'></input>
                    </div>
                </div>

                <div class="fcf-form-group">
                  <label for="Message" class="fcf-label">Link zur Website</label>
                  <div class="fcf-input-group">
                      <input id="text" class="fcf-form-control" rows="6" name="website" required value='<?php echo $entry['website'];?>'></input>
                  </div>
              </div>

              <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Verantwortlicher</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="verantwortlicher" required value='<?php echo $entry['verantwortlicher'];?>'></input>
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
