<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //sth was posted
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        if(!empty($user_email) && !empty($user_password) && !is_numeric($user_email)){
            // save to db
            $query = "insert into users (user_email,user_password) values ('$user_email','$user_password')";
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else {
            echo "Please enter valid information!!!";
        }
    }
    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_email"><br><br>
			<input id="text" type="password" name="user_password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>