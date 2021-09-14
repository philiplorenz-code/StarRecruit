<?php 

// SQL Server Config
$sqlConfig = array(
    "servername" => "localhost",
    "username" => "webd_philip",
    "password" => "nvzHol-#p6PEu#ai",
    "dbname" => "webd_db"
);

function getAllUsers($sqlConfig) {
    // Create connection
    $conn = new mysqli($sqlConfig["servername"], $sqlConfig["username"], $sqlConfig["password"], $sqlConfig["dbname"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  
    // SQL Insert
    $sql = "SELECT * FROM `users`;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "user_id: " . $row["user_id"]. " - user_name: " . $row["user_name"]. " - user_email: " . $row["user_email"] . "<br>";
        }
    } 
    else {
        echo "0 results";
    }


    // Close Connection
    $conn->close();

}

getAllUsers($sqlConfig);