<?php
include("connection.php");
include("functions.php");

$ReqPointsAll = 3;
$ReqPointsHard = 4;
$ReqPointsSoft = 4;
$ReqPointsLang = 1;

// Check Arrays for equal values
function checkArray($array1, $array2){
    $count = 0;
    foreach ($array1 as $arr1){
        foreach ($array2 as $arr2){
            if ($arr1 == $arr2){
                $count++;
            }
            else {

            }
        }
    }
    return $count;
}

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

        // IDs
        $PreMatch["SearchID"] = $search["id"];
        $PreMatch["UserID"] = $user["user_id"];

        // GEHALT
        if ($user["mind_gehalt"] <= $search["max_gehalt"]){
            $PreMatch["Gehalt"] = 1;
        }
        else {
            $PreMatch["Gehalt"] = 0;
        }

        // PLZ TODO (https://mizine.de/html/mit-google-maps-api-entfernungen-berechnen/)
        $PreMatch["PLZ"] = 1;

        // Softskills        
        $SearchSkills = explode(',', $search["softskills"]);
        $UserSkills = explode(',', $search["softskills"]);
        if (checkArray($SearchSkills,$UserSkills) >= $ReqPointsSoft){
            $PreMatch["Softskills"] = 1;
        }
        elseif(checkArray($SearchSkills,$UserSkills) < $ReqPointsSoft){
            $PreMatch["Softskills"] = 0;
        }
        else{
            $PreMatch["Softskills"] = 2;
        }

        // Hardskills        
        $SearchSkills = explode(',', $search["hardskills"]);
        $UserSkills = explode(',', $search["hardskills"]);
        if (checkArray($SearchSkills,$UserSkills) >= $ReqPointsHard){
            $PreMatch["Hardskills"] = 1;
        }
        elseif(checkArray($SearchSkills,$UserSkills) < $ReqPointsHard){
            $PreMatch["Hardskills"] = 0;
        }
        else{
            $PreMatch["Hardskills"] = 2;
        }

        // Language        
        $SearchSkills = explode(',', $search["sprachen"]);
        $UserSkills = explode(',', $search["sprachen"]);
        echo "Search:" . "</br>";
        var_dump($SearchSkills);
        echo "User:" . "</br>";
        var_dump($UserSkills);
        if (checkArray($SearchSkills,$UserSkills) >= $ReqPointsLang){
            $PreMatch["Sprachen"] = 1;
        }
        elseif(checkArray($SearchSkills,$UserSkills) < $ReqPointsLang){
            $PreMatch["Sprachen"] = 0;
        }
        else{
            $PreMatch["Sprachen"] = 2;
        }


        array_push($PreMatches, $PreMatch);
    }
}

var_dump($PreMatches);


// PREMATCHES TO MATCHES 
foreach ($PreMatches as $premat){
    $sum = $premat["Gehalt"] + $premat["PLZ"] + $premat["Hardskills"] + $premat["Softskills"] + $premat["Sprachen"];
    if ($sum >= $ReqPointsAll){

    }
}



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

*/
?>
