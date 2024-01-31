<?php

//author @lorena
include_once "../model/User.class.php";
session_start();



$user_ID = $_COOKIE["user_id"] ;
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

$hash = password_hash($password1, PASSWORD_BCRYPT);
DBManagement::resetPassword($hash, $user_ID);
header("Location:/view/login.php");

?>

