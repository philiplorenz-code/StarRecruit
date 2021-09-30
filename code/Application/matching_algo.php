<?php
include("connection.php");
include("functions.php");

function RecursiveWrite($array) {
    foreach ($array as $vals) {
        echo $vals['comment_content'] . "\n";
        RecursiveWrite($vals['child']);
    }
}

$Users = [];
$query = "select * from users;";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($Users,$row);
}

// RecursiveWrite($Users);

print_r($Users);