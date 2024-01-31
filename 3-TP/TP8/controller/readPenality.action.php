<?php
/*
Made by @Amelie
*/

session_start();

include_once "../model/Penality.class.php";


// appel de fonction pour récupérer le tableau des infractions de l'utilisation
$listPenality = DBManagement::readPenalities();

// mise en session du tableau
$_SESSION["listPenality"] = $listPenality;
