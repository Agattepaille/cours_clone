<?php
/*
MADE BY @Lorena
*/
include_once "../model/User.class.php";


$_SESSION["snitches"] = DBManagement::readSnitches();
$_SESSION["totalinsultSnitches"]= DBManagement::totalInsultSnitches();