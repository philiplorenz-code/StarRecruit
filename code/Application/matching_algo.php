<?php
include("connection.php");
include("functions.php");


// GET ALL USERS
$Users = [];
$query = "select * from users where user_acctype='Arbeitssuchender';";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($Users,$row);
}

print_r($Users);