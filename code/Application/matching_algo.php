<?php
include("connection.php");
include("functions.php");

$query = "select * from users;";
$result = mysqli_query($con, $query);
$entry = $result->fetch_assoc();