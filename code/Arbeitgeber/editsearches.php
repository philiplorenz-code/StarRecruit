<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_id = $user_data["user_id"];

    // Get all searches
    $query = "select * from search where recruiter_id='$user_id';";
    $result = mysqli_query($con, $query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['edit'])){
            $id = $_POST['edit'];
            header( "Location: http://webdev.learning-it.io/Application/editsearch.php?data=$id" );
        }
        elseif(isset($_POST['del'])){
            $id = $_POST['del'];
            $query = "DELETE FROM search WHERE id='$id';";
            mysqli_query($con, $query);
            header("Location: editsearches.php");
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
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="./editsearches.php" class="active">
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
                                            <th>Name der Suche</th>
                                            <th>Bearbeiten</th>
                                            <th>Löschen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td> " . " <form method='post'> <button type='submit' name='edit' value=" . $row['id'] . ">Suche Bearbeiten</button> </form>" . "</td>";
                                                    echo "<td> " . " <form method='post'> <button type='submit' name='del' value=" . $row['id'] . ">Suche Löschen</button> </form>" . "</td>";
                                                    echo "</tr>";
                                            }
                                        ?>
                                    </tbody>

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
