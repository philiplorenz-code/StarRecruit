<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_id = $user_data["user_id"];

    // Get all messages to user
    $query = "select * from nachrichten where user_id='$user_id'"; // and status='accepted';
    $result = mysqli_query($con, $query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['invite'])){
            $nachricht_id = $_POST['invite'];
            $query = "UPDATE nachrichten SET status='eingeladengespraech' WHERE id='$nachricht_id';";
            mysqli_query($con, $query);
            header("Location: postfachag.php");
            die;
        }
        elseif(isset($_POST['assess'])){
            $nachricht_id = $_POST['assess'];
            $query = "UPDATE nachrichten SET status='eingeladenAssess' WHERE id='$nachricht_id';";
            mysqli_query($con, $query);
            header("Location: postfachag.php");
            die;
        }
        elseif(isset($_POST['del'])){
          $nachricht_id = $_POST['del'];
          $query = "DELETE FROM nachrichten WHERE id='$nachricht_id';";
          mysqli_query($con, $query);
          header("Location: postfachag.php");
          die;
      }
        else{
        }
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
        <span class="dashboard">Postfach</span>
      </div>


    </nav>

    <div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales100 box">

          <div class="body">
            <table>
               <thead>
                  <tr>
                     <th>Nummer</th>
                     <th>Status</th>
                     <th>Bewerbungsgespräch</th>
                     <th>Assessmentcenter</th>
                     <th>Löschen</th>
                  </tr>
               </thead>

               <?php
                while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td> " . " <form method='post'> <button type='submit' id='myButton' name='invite' value=" . $row['id'] . "> Einladung zu Gespräch </button> </form>" . "</td>";
                        echo "<td> " . " <form method='post'> <button type='submit' id='myButton' name='assess' value=" . $row['id'] . "> Einladung zu AssessmentCenter </button> </form>" . "</td>";
                        echo "<td> " . " <form method='post'> <button type='submit' id='myButton' name='del' value=" . $row['id'] . "> Löschen </button> </form>" . "</td>";
                        echo "</tr>";
                }
              ?>

            </table>
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
