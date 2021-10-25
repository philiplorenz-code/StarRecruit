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
            $vorname = $_POST['vorname'];
            $name = $_POST['name'];
            $wohnort = $_POST['wohnort'];
            $user_alter = $_POST['user_alter'];
            $beschreibung = $_POST['beschreibung'];
            $sprachen = $_POST['sprachen'];
            $softskills = $_POST['softskills'];
            $hardskills = $_POST['hardskills'];
            $mind_gehalt = $_POST['mind_gehalt'];
            $beruf = $_POST['beruf'];
    
            // save to db
            $query = "update users set vorname='$vorname',name='$name',wohnort='$wohnort',user_alter='$user_alter',beschreibung='$beschreibung',sprachen='$sprachen',softskills='$softskills',hardskills='$hardskills',mind_gehalt='$mind_gehalt',beruf='$beruf' where user_id='$user_id';";

            // echo $query;
            mysqli_query($con, $query);


            //exec("php matching_algo.php");
            exec("php /home/webdev.learning-it.io/public_html/code/ApplicationLogic/matching_algo.php");


    
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
          <a href="./profile.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Profil Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./postfachan.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Posteingang</span>
          </a>
        </li>
        <li>
          <a href="./settings.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Einstellungen</span>
          </a>
        </li>
        <li class="log_out">
          <a href="./logout.php">
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
                    <label for="Name" class="fcf-label">Vorname</label>
                    <div class="fcf-input-group">
                        <input type="text" id="Name" class="fcf-form-control" name="vorname" value='<?php echo $entry['vorname'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Name" class="fcf-label">Nachname</label>
                    <div class="fcf-input-group">
                        <input type="text" id="Name" class="fcf-form-control" name="name" value='<?php echo $entry['name'];?>'>
                    </div>
                </div>
        
                <div class="fcf-form-group">
                    <label for="Message" class="fcf-label">Wohnort</label>
                    <div class="fcf-input-group">
                        <input id="text" class="fcf-form-control" rows="6" name="wohnort" value='<?php echo $entry['wohnort'];?>'></input>
                    </div>
                </div>

                <div class="fcf-form-group">
                  <label for="Message" class="fcf-label">Alter</label>
                  <div class="fcf-input-group">
                      <input id="text" class="fcf-form-control" rows="6" name="user_alter" value='<?php echo $entry['user_alter'];?>'></input>
                  </div>
              </div>

              <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Beschreibung</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="beschreibung" value='<?php echo $entry['beschreibung'];?>'></input>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Sprachen (kommagetrennt)</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="sprachen" value='<?php echo $entry['sprachen'];?>'></input>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">SoftSkills (kommagetrennt)</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="softskills" value='<?php echo $entry['softskills'];?>'></input>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">HardSkills (kommagetrennt)</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="hardskills" value='<?php echo $entry['hardskills'];?>'></input>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Gewünschtes Jahresgehalt</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="mind_gehalt" value='<?php echo $entry['mind_gehalt'];?>'></input>
                </div>
            </div>

            <div class="fcf-form-group">
                <label for="Message" class="fcf-label">Beruf</label>
                <div class="fcf-input-group">
                    <input id="text" class="fcf-form-control" rows="6" name="beruf" value='<?php echo $entry['beruf'];?>'></input>
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
