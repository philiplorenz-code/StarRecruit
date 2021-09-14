<?php 

// SQL Server Config
$sqlConfig = array(
    "servername" => "localhost",
    "username" => "webd_philip",
    "password" => "nvzHol-#p6PEu#ai",
    "dbname" => "webd_db"
);


// Returns all Users (id, name, mail)
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
            echo $row["user_id"] . "<br>";
            echo $row["user_name"] . "<br>";
            echo $row["user_email"] . "<br>";
        }
    } 
    else {
        echo "0 results";
    }


    // Close Connection
    $conn->close();

}



// Returns all Nachrichten (id, user_id, unternehmen_id, status)
function getAllNachrichten($sqlConfig) {
    // Create connection
    $conn = new mysqli($sqlConfig["servername"], $sqlConfig["username"], $sqlConfig["password"], $sqlConfig["dbname"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  
    // SQL Insert
    $sql = "SELECT * FROM `nachrichten`;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["id"] . "<br>";
            echo $row["user_id"] . "<br>";
            echo $row["unternehmen_id"] . "<br>";
            echo $row["status"] . "<br>";
        }
    } 
    else {
        echo "0 results";
    }


    // Close Connection
    $conn->close();

}



getAllNachrichten($sqlConfig);