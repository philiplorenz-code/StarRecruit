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
          <a href="./home.html">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Account-Start</span>
          </a>
        </li>
        <li>
          <a href="./editsearch.html">
            <i class='bx bx-box' ></i>
            <span class="links_name">Profil Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./profile.html">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Posteingang</span>
          </a>
        </li>
        <li>
          <a href="./settings.html">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Einstellungen</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">StarRecruitment</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="./home.html">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="./editsearch.html">
            <i class='bx bx-box' ></i>
            <span class="links_name">Suchen Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./profile.html">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Profil Bearbeiten</span>
          </a>
        </li>
        <li>
          <a href="./postfachag.html" class="active">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Postfach</span>
          </a>
        </li>
        <li>
          <a href="./settings.html">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Einstellungen</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
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
                  </tr>
               </thead>
               <tr>
                  <td><a href="#">INV1001</a></td>
                  <td>Paragon</td>
                  <td>1/5/2021</td>
                  <td>
                     <p class="status status-unpaid">Unpaid</p>
                  </td>
               </tr>
               <tr>
                  <td><a href="#">INV1002</a></td>
                  <td>Sonic</td>
                  <td>1/4/2021</td>
                  <td>
                     <p class="status status-paid">Paid</p>
                  </td>
               </tr>
               <tr>
                  <td><a href="#">INV1003</a></td>
                  <td>Innercircle</td>
                  <td>1/2/2021</td>
                  <td>
                     <p class="status status-pending">Pending</p>
                  </td>
               </tr>
               <tr>
                  <td><a href="#">INV1004</a></td>
                  <td>Varsity Plus</td>
                  <td>12/30/2020</td>
                  <td>
                     <p class="status status-pending">Pending</p>
                  </td>
               </tr>
               <tr>
                  <td><a href="#">INV1005</a></td>
                  <td>Highlander</td>
                  <td>12/18/2020</td>
                  <td>
                     <p class="status status-paid">Paid</p>
                  </td>
               </tr>
               </tr>
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
