<?php

function check_login($con){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    // redirect to login
    else {
        header("Location: https://webdev.learning-it.io/ApplicationLogic/login.php");
        die;
    }

}


function run_algo(){

    echo "algo1";

    // Custom Reqs
    $ReqPointsAll = 3;
    $ReqPointsHard = 1;
    $ReqPointsSoft = 1;
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
    
    
    // Receive all users from db
    $Users = [];
    $query = "select * from users where user_acctype='Arbeitssuchender';";
    $result = mysqli_query($con, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($Users,$row);
    }
    
    
    echo "algo2";
    
    // Receive all searches from db
    $Searches = [];
    $query = "select * from search;";
    $result = mysqli_query($con, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($Searches,$row);
    }
    echo "algo3";
    
    // Create PreMatches (Any constellation will be mapped and rated afterwards by its attributes (Gehalt, Sprachen, etc.))
    $PreMatches = [];
    foreach ($Searches as $search){
        foreach ($Users as $user){
            $PreMatch = [];
            echo "algo4";
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
            echo "algo5";
            // PLZ TODO (https://mizine.de/html/mit-google-maps-api-entfernungen-berechnen/)
            $PreMatch["PLZ"] = 1;
    
            // Softskills
            $searchForValue = ',';

            $SearchSkillsSoft = [];   
            if( strpos(($search["softskills"]), $searchForValue) !== false ) {
                array_push($SearchSkillsSoft,(explode(',', $search["softskills"])));   
            }
            else {
                array_push($SearchSkillsSoft,$search["softskills"]);  
            }
            // $SearchSkillsSoft[] = explode(',', $search["softskills"]);

            $UserSkillsSoft = [];   
            if( strpos(($user["softskills"]), $searchForValue) !== false ) {
                array_push($UserSkillsSoft,(explode(',', $user["softskills"]))); 
            }
            else {
                array_push($UserSkillsSoft,$user["softskills"]);  
            }
            // $UserSkills[] = explode(',', $search["softskills"]);

            if (checkArray($SearchSkillsSoft,$UserSkillsSoft) >= $ReqPointsSoft){
                $PreMatch["Softskills"] = 1;
            }
            elseif(checkArray($SearchSkillsSoft,$UserSkillsSoft) < $ReqPointsSoft){
                $PreMatch["Softskills"] = 0;
            }
            else{
                $PreMatch["Softskills"] = 2;
            }
    
            // Hardskills   
            $searchForValue = ',';   
            $SearchSkillsHard = [];  
            if( strpos(($search["hardskills"]), $searchForValue) !== false ) {
                array_push($SearchSkillsHard,(explode(',', $search["hardskills"])));  
            }
            else {
                array_push($SearchSkillsHard,$search["hardskills"]);  
            } 

            // $SearchSkillsSoft[] = explode(',', $search["softskills"]);
            $UserSkillsHard = []; 
            if( strpos(($user["hardskills"]), $searchForValue) !== false ) {
                array_push($UserSkillsHard,(explode(',', $user["hardskills"]))); 
            }
            else {
                array_push($UserSkillsHard,$user["hardskills"]);  
            }

            // $UserSkills[] = explode(',', $search["softskills"]); 

            // $SearchSkills = explode(',', $search["hardskills"]);
            // $UserSkills = explode(',', $search["hardskills"]);

            if (checkArray($SearchSkillsHard,$UserSkillsHard) >= $ReqPointsHard){
                $PreMatch["Hardskills"] = 1;
            }
            elseif(checkArray($SearchSkillsHard,$UserSkillsHard) < $ReqPointsHard){
                $PreMatch["Hardskills"] = 0;
            }
            else{
                $PreMatch["Hardskills"] = 2;
            }
    



            // Language       
            $searchForValue = ',';   

            $SearchSkillsLang = [];  
            if( strpos(($search["sprachen"]), $searchForValue) !== false ) {
                array_push($SearchSkillsLang,(explode(',', $search["sprachen"])));  
            }
            else {
                array_push($SearchSkillsLang,$search["sprachen"]);  
            } 

            $UserSkillsLang = [];  
            if( strpos(($user["sprachen"]), $searchForValue) !== false ) {
                array_push($UserSkillsLang,(explode(',', $user["sprachen"])));  
            }
            else {
                array_push($UserSkillsLang,$user["sprachen"]);  
            } 
            
            if (checkArray($SearchSkills,$UserSkills) >= $ReqPointsLang){
                $PreMatch["Sprachen"] = 1;
            }
            elseif(checkArray($SearchSkills,$UserSkills) < $ReqPointsLang){
                $PreMatch["Sprachen"] = 0;
            }
            else{
                $PreMatch["Sprachen"] = 2;
            }
    
            // Merge to PreMatches Array
            array_push($PreMatches, $PreMatch);
        }
    }
    
    // PREMATCHES TO MATCHES (By Setting a rating minimum and checking db (to avoid duplicates))
    foreach ($PreMatches as $premat){
            // sum for rating:
            $sum = $premat["Gehalt"] + $premat["PLZ"] + $premat["Hardskills"] + $premat["Softskills"] + $premat["Sprachen"];
            if ($sum >= $ReqPointsAll){
                    $searchid = $premat["SearchID"];
                    $userid = $premat["UserID"];
                    $gehalt = $premat["Gehalt"];
                    $plz = $premat["PLZ"];
                    $hardskills = $premat["Hardskills"];
                    $softskills = $premat["Softskills"];
                    $sprachen = $premat["Sprachen"];
    
                    // Check if entry already exists:
                    $query_check = "select * from matches where (searchid='$searchid' and userid='$userid');";
                    $checkresult = mysqli_query($con, $query_check);
                    $rowcount=mysqli_num_rows($checkresult);
    
    
                    if ($rowcount > 0){
                        // entry already exists
                    }
                    else {
                        // Create new Match in DB
                        $query = "insert into matches (searchid,userid,gehalt,plz,hardskills,softskills,sprachen) values ('$searchid','$userid','$gehalt','$plz','$hardskills','$softskills','$sprachen');";
                        mysqli_query($con, $query);
    
                        // Create new Message by getting the recruiterid before
                        $query_getunternehmenid = "select recruiter_id from search where id='$searchid';";
                        $resultunternehmensid = mysqli_query($con, $query_getunternehmenid);
                        $row = $resultunternehmensid->fetch_assoc();
                        $rec_id = $row["recruiter_id"];
    
                        $query_message = "insert into nachrichten (user_id,unternehmen_id,status) values ('$userid','$rec_id','offen');";
                        mysqli_query($con, $query_message);
    
                    }
                        
        
            }
    
    
        
    
    }
    return 0;

    }