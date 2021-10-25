<?php
   session_start();
   
       include("connection.php");
       include("functions.php");
       
       $user_data = check_login($con);
       $user_id = $user_data["user_id"];

       echo 1;
       run_algo();