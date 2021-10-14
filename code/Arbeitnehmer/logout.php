<?php
session_start();

if (isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
}

header("Location:  https://webdev.learning-it.io/ApplicationLogic/login.php");
die;