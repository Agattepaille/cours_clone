<?php


include_once "../model/Infraction.class.php";
include_once "../model/User.class.php";

// Get the stats from DB using methods
$totalUnpaidDebts = DBManagement::totalAllDebt();
$totalInsult = DBManagement::totalAllInsults();
$MRP = DBManagement::findMRP();
$lastInsult = DBManagement::lastInfractionCheckedDate();
$totalStudents = DBManagement::totalStudents();

$personalUnpaidDebt = DBManagement::totalToPay($_COOKIE["user_id"]);
$howFarFromMRP = DBManagement::howFarFromMRP($_COOKIE["user_id"]);
$totalPersonalInsult = DBManagement::totalPersonalInsult($_COOKIE["user_id"]);

$bestSnitch = DBManagement::readBestSnitch();

//we register the variables in the sessions so that we can display them in the view
$_SESSION["totaldebts"] = $totalUnpaidDebts;
$_SESSION["totalInsult"] = $totalInsult;
$_SESSION["mrp"] = $MRP;

$_SESSION["personalUnpaidDebt"] = $personalUnpaidDebt;
$_SESSION["howFarFromMRP"] = $howFarFromMRP;
$_SESSION["totalPersonalInsult"] = $totalPersonalInsult;

$_SESSION["lastInsult"] = $lastInsult;
$_SESSION["totalStudents"] = $totalStudents;

$_SESSION["bestSnitch"] = $bestSnitch->getFirstname();
