<?php
session_start();

    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_id = $user_data["user_id"];

    // Get all messages to user
    $query = "select * from nachrichten where user_id='$user_id' and status='accepted';";
    $result = mysqli_query($con, $query);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_POST['invite'])){
            $nachricht_id = $_POST['accept'];
            $query = "UPDATE nachrichten SET status='eingeladen' WHERE id='$nachricht_id';";
            mysqli_query($con, $query);
            header("Location: postfachag.php");
            die;
        }
        elseif(isset($_POST['assess'])){
            $nachricht_id = $_POST['deny'];
            $query = "UPDATE nachrichten SET status='eingeladenAssess' WHERE id='$nachricht_id';";
            mysqli_query($con, $query);
            header("Location: postfachag.php");
            die;
        }
        else{
        }
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
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="far fa-lightbulb"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>SR</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/homean.php"><i class="fas fa-table"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/editprofilean.php"><i class="fas fa-table"></i><span>Profil Bearbeiten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="https://webdev.learning-it.io/Application/postfachan.php"><i class="fas fa-table"></i><span>Postfach</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Postfach</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nummer</th>
                                            <th>Status</th>
                                            <th>Bewerbungsgespräch</th>
                                            <th>Assesmentcenter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['status'] . "</td>";
                                                    echo "<td> " . " <form method='post'> <button type='submit' name='invited' value=" . $row['id'] . "> Einladung zu Gespräch </button> </form>" . "</td>";
                                                    echo "<td> " . " <form method='post'> <button type='submit' name='assess' value=" . $row['id'] . "> Einladung zu AssessmentCenter </button> </form>" . "</td>";
                                                    echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Nummer</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Bewerbungsgespräch</strong></td>
                                            <td><strong>Assesmentcenter</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


