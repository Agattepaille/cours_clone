<?php
/*
Made by @dylan
*/
include_once "../model/User.class.php";
include_once "../model/Penality.class.php";


$allUsers = DBManagement::readUsers();
$_SESSION["allUsers"] = $allUsers;

$_SESSION['penalities'] = DBManagement::readPenalities();