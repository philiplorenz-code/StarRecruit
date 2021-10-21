<?php
   session_start();
   
       include("connection.php");
       include("functions.php");

       
       $user_data = check_login($con);
       $user_id = $user_data["user_id"];

             // Get username
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
        <span class="dashboard">Ueberschrift</span>
      </div>


    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
        <div class="title"><?php echo "Hey " . $entry . ", du hast " . $num_rows . " neue Benachrichtigungen!" ?>
        </div>
      </div>
    </br>


    <div id="eintrag">
      <h2>StarRecruitment feiert 1. Jubiläum <br></h2> 
       <strong>
           StarRecruitment feiert sein erstes Jubiläum. Zu diesem Anlass blicken wir auf die Entstehungsgeschichte unserer Firma zurück und schauen uns die Erfolgsstories einiger unserer Nutzer an. Ebenfalls geben uns die Gründer von StarRecruitment einen Ausblick in die Zukunft und präsentieren unser neues innovatives Feature...
        <a href="" target="_blank">mehr erfahren</a>
       </strong>
     </div>
   <br>

   <br>
     <div id="eintrag2">
      <h2>10.000 vermittelte Jobs!<br></h2> 
       <Strong>
          Am 4. Oktober 2021 haben wir einen großen Meilenstein erreicht. StarRecruitment hat erfolgreich 10.000 Arbeitssuchende an ihren Traumjob vermittelt und anlässlich dessen verlosen wir unter unseren Arbeitssuchenden einen Porsche Cayman S in der Farbe WhatsAppGruppen-Grün...
        <a href="" target="_blank">mehr erfahren</a>
       </Strong>
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
