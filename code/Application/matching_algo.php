<?php
include("connection.php");
include("functions.php");

$Users = [];
$query = "select * from users;";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($Users,$row);
}

print_r($new_array);