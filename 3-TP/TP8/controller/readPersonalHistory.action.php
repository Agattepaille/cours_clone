<?php
/*
Made by @Amelie
*/
//session_start();

include_once "../model/Infraction.class.php";

// appel de fonction pour récupérer le tableau des infractions de l'utilisation
$listInfractions = DBManagement::readPersonalHistory($_COOKIE["user_id"]);

// mise en session du tableau
$_SESSION["listInfractions"] = $listInfractions;
