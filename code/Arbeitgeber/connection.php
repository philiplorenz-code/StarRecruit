<?php


// Database Config
$servername = "localhost";
$username = "webd_philip";
$password = "nvzHol-#p6PEu#ai";
$dbname = "webd_db";

if(!$con = mysqli_connect($servername,$username,$password,$dbname)){
    die("failed to connect!");
}
 