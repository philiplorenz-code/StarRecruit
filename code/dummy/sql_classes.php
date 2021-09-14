<?php 

// SQL Server Config
$sqlConfig = array(
    "servername" => "localhost",
    "username" => "webd_philip",
    "password" => "nvzHol-#p6PEu#ai",
    "dbname" => "webd_db"
);


// Returns all Users 
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
            echo "UserID: " . $row["user_id"] . "<br>";
            echo "Mail: " . $row["user_email"] . "<br>";
            echo "Password: " . $row["user_password"] . "<br>";
            echo "Vorname: " . $row["vorname"] . "<br>";
            echo "Nachname: " . $row["name"] . "<br>";
            echo "Beschreibung: " . $row["beschreibung"] . "<br>";
            echo "Beruf: " . $row["beruf"] . "<br>";
            echo "Mindestgehalt: " . $row["mind_gehalt"] . "<br>";
            echo "Skills: " . $row["skills"] . "<br>";
            echo "Profilbild: " . $row["profilbild"] . "<br>";
            echo "Template: " . $row["template"] . "<br>";
            echo "PageID: " . $row["pageid"] . "<br>";
            echo "Startdatum: " . $row["startdatum"] . "<br>";
        }
    } 
    else {
        echo "0 results";
    }


    // Close Connection
    $conn->close();

}
// Returns all Nachrichten 
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
// Insert new Nachricht
function createNewMessageFromUnternehmen($sqlConfig, $unternehmen_id, $user_id) {
    // Create connection
    $conn = new mysqli($sqlConfig["servername"], $sqlConfig["username"], $sqlConfig["password"], $sqlConfig["dbname"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  
    // SQL Insert
    $sql = "INSERT INTO nachrichten (user_id, unternehmen_id, status) VALUES ('$user_id', '$unternehmen_id', 'offen');";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    // Close Connection
    $conn->close();

}


//createNewMessageFromUnternehmen($sqlConfig, "unternehmen3", "user3");
getAllNachrichten($sqlConfig);
