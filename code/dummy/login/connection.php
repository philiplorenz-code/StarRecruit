<?php


// Database Config
$servername = "localhost";
$username = "webd_philip";
$password = "nvzHol-#p6PEu#ai";
$dbname = "webd_db";

if(!$con = mysqli_connect($servernamem,$username,$password,$dbname)){
    die("failed to connect!");
}



// not required anymore:
/*
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// SQL Insert
$sql = "INSERT INTO users (user_mail, user_password)
VALUES ('$username', '$user_password')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close Connection
$conn->close();
