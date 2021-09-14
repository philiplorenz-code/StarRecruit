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
    if ($result === TRUE) {
        echo $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close Connection
    $conn->close();

}

getAllUsers($sqlConfig);