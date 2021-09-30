<?php
include("connection.php");
include("functions.php");

$ReqPoints = 3;

// GET ALL USERS
$Users = [];
$query = "select * from users where user_acctype='Arbeitssuchender';";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($Users,$row);
}
//print_r($Users);


// GET ALL MATCHES
$DBMatches = [];
$query = "select * from users where user_acctype='Arbeitssuchender';";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($DBMatches,$row);
}
//print_r($Users);


// GET ALL SEARCHES
$Searches = [];
$query = "select * from search;";
$result = mysqli_query($con, $query);
while ($row = $result->fetch_assoc()) {
    array_push($Searches,$row);
}
//print_r($Searches);


// Set PreMatch Values
$PreMatches = [];
foreach ($Searches as $search){
    foreach ($Users as $user){
        $PreMatch = [];
        $PreMatch["SearchID"] = $search["id"];
        $PreMatch["UserID"] = $user["user_id"];

        array_push($PreMatches, $PreMatch);
    }
}

print_r($PreMatches)

/*

// MATCHES RAW - Just for orientation
//$PreMatches = [];
// CFG
$PreMatch34 = array(
    "SearchID" => 1,
    "UserID" => 1,
    "Gehalt" => 0,
    "PLZ" => 0,
    "Hardskills" => 0,
    "Softskills" => 0,
    "Sprachen" => 0,
);
array_push($PreMatches34,$PreMatch34);


// Matches (Fitting SUM and not existing already)
$Matches = [];

// IF SUM >= 3
// AND
// IF (! DBSearch==Search && DBUser == User)
// ----> $PreMatch -> $Match


// All Matches To DB And Transform to Message (Status open from searchid->recruiterid to userid)



